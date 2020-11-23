<?php

namespace Aoeng\LaravelTronscan;


use IEXBase\TronAPI\Tron;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('tronscan.php'),
        ], 'tronscan');

    }

    public function register()
    {
        $this->app->singleton('tronscan', function ($data) {
            return new Tronscan();
        });
    }

}
