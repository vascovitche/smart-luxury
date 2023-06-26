<?php

namespace Modules\ClientApi\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class ClientApiServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'ClientApi';

    public function boot()
    {
        $this->registerFactories();
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    private function registerFactories()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return "Modules\\$this->moduleName\\Database\\Factories\\" . class_basename($modelName) . 'Factory';
        });
    }
}