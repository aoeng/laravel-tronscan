<?php

namespace Aoeng\Laravel\Tronscan;


use Illuminate\Support\ServiceProvider;

class TronscanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/tronscan.php' => config_path('tronscan.php'),
        ], 'tronscan');

    }

    public function register()
    {
        $this->app->singleton('tron', function ($app) {
            return new Tronscan();
        });
    }

}
