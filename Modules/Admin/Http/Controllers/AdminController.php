<?php

namespace Modules\Admin\Http\Controllers;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Admin\Components\SessionAlerts;
use Modules\Admin\Models\Language;
use Modules\Admin\Models\Order;

abstract class AdminController
{
    use ValidatesRequests;

    private function getOrders()
    {
        return Order::where('status', OrderStatus::NEW->value)->count();
    }

    protected function getLanguages(): Collection
    {
        return Language::all();
    }

    protected function view($view, array $data = [])
    {
        $data['orderCount'] = $this->getOrders();
        return view('admin::' . $view, $data);
    }

    protected function showSuccessMessage($message)
    {
        (new SessionAlerts)->success($message);
    }

    protected function showErrorMessage($message)
    {
        (new SessionAlerts)->error($message);
    }

    protected function showWarningMessage($message)
    {
        (new SessionAlerts)->warning($message);
    }
}
