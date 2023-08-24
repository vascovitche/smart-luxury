<?php

namespace App\Actions;

use AlfaDevTeam\RestApiResponses\Controllers\ApiResponses;
use Exception;
use Illuminate\Support\Facades\Cache;

class CacheAmoCRMToken
{
    use ApiResponses;
    public function execute()
    {
        $accessToken = Cache::get('amocrm_token');

        try {
            if ($accessToken['expires'] > now()) {
                return $accessToken;
            } else {
                $data = [
                    'client_id' => config('amocrm.integration_id'),
                    'client_secret' => config('amocrm.secret_key'),
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $accessToken['refreshToken'],
                    'redirect_uri' => config('amocrm.redirect_uri'),
                ];

                $newData = (new RequestNewAmoCRMToken)->execute($data);

                Cache::put('amocrm_token', $newData);

                return $newData;
            }

        } catch (Exception $e) {
            $this->respondError($e->getMessage(), 500);
        }
    }

}
