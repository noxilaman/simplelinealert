<?php

namespace noxil\simplelinealert;

use Illuminate\Support\ServiceProvider;

class SimpleLineAlertServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->mergeConfigFrom(__DIR__.'/../config/config.php','simplelinealert');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if ($this->app->runningInConsole()) {

            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('simplelinealert.php'),
            ], 'config');
        
          }
    }
}
