<?php

namespace Modules\Admin\Http\Controllers\Amo;

use App\Actions\CacheAmoCRMToken;
use App\Actions\RequestNewAmoCRMToken;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Http\Controllers\AdminController;

class AmoController extends AdminController
{

    public function index()
    {
        return $this->view('amo.index');
    }

    public function integration()
    {
        $state = bin2hex(random_bytes(16));

        Cache::put('stateamo', $state, 60 * 20);

        $authorizationUrl = config('amocrm.product_domain') . 'oauth?client_id=' . config('amocrm.integration_id') . '&state=' . $state . '&mode=post_message';

        return redirect()->away($authorizationUrl);
    }

    public function getAmoToken()
    {
        if (request()->get('state') !== Cache::get('stateamo')) {
            $this->showErrorMessage('Integration failed! State is not valid. Please try again.');
            return redirect()->route('admin.home');
        }

        $code = request()->get('code');

        $data = [
            'client_id' => config('amocrm.integration_id'),
            'client_secret' => config('amocrm.secret_key'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => config('amocrm.redirect_uri'),
        ];

        $newData = (new RequestNewAmoCRMToken)->execute($data);

        Cache::put('amocrm_token', $newData);

        $this->createCustomFieldsForAmoCRM();

        $this->showSuccessMessage('Integration with auth were successfully completed!');

        return redirect()->route('admin.home');
    }

    private function createCustomFieldsForAmoCRM()
    {
        $accessToken = (new CacheAmoCRMToken)->execute();

        $data = $this->formRequestFieldsData();
        try {
            Http::withHeaders([
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken['accessToken'],
            ])->post(config('amocrm.referer') . config('amocrm.api_uri') . 'leads/custom_fields', $data);
        } catch (\Exception $e) {
            $this->showErrorMessage('Integration failed! Please try again. ' . $e->getMessage());
        }
    }

    private function formRequestFieldsData()
    {
        return [
            [
                'name' => 'Имя',
                'type' => 'text',
                'code' => config('amocrm.custom_fields.customer_name'),
                'is_required' => true,
            ],
            [
                'name' => 'Номер Телефона',
                'type' => 'text',
                'code' => config('amocrm.custom_fields.customer_phone'),
                'is_required' => true,
            ],
            [
                'name' => 'Email',
                'type' => 'text',
                'code' => config('amocrm.custom_fields.customer_email'),
                'is_required' => false,
            ],
            [
                'name' => 'Код Продукта',
                'type' => 'text',
                'code' => config('amocrm.custom_fields.customer_product_code'),
                'is_required' => false,
            ],
        ];
    }

}
