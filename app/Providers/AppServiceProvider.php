<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('FORCE_HTTPS')) {
            URL::forceScheme('https');
        }

        // Schema::defaultStringLength(191);

        if (env('APP_ENV') !== 'testing') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: Authorization, Content-Type, Cache-Control, X-Requested-With');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS' && array_key_exists('HTTP_ACCESS_CONTROL_REQUEST_METHOD', $_SERVER)) {
            exit;
        }
    }
}
