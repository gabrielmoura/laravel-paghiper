<?php

namespace Blx32\LaravelPagHiper;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PagHiperServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->app->singleton('blx32.paghiper', function ($app) {
            return $app->make(PagHiper::class);
        });

        // Copies the config file to project config directory on: php artisan vendor:publish
        $this->publishes([
            __DIR__ . '/Config/paghiper.php' => config_path('paghiper.php'),
        ], 'config');

        // Publishes the migrations into the application's migrations folder
        $this->publishes([
            __DIR__ . '/Migrations/' => database_path('migrations'),
        ], 'migrations');

        /*if (! $this->app->routesAreCached() && config('paghiper.publish_routes', false)) {
            require __DIR__.'/routes.php';
        }*/

        $this->mergeConfigFrom(
            __DIR__ . '/config/paghiper.php',
            'paghiper'
        );
    }

    protected function bootRoutes()
    {
        if (Cashier::$registersRoutes) {
            Route::group([
                'prefix' => config('cashier.path'),
                'namespace' => 'Blx32\Http\Controllers',
                'as' => 'cashier.',
            ], function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });
        }
    }

    public function provides()
    {
        return ['blx32.paghiper'];
    }
}