<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
    $this->app->alias('Mpesa', \Safaricom\Mpesa\Facades\Mpesa::class);
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
