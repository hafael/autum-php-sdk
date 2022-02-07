<?php

namespace Autum\SDK;

use Illuminate\Support\ServiceProvider;

class AutumSDKServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->publishes([
            __DIR__.'/../config/autum.php' => config_path('autum.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/autum.php', 'autum',
        );
    }
    
}