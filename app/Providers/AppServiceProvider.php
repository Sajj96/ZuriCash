<?php

namespace App\Providers;

use App\Services\ExchangeRateService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        $this->app->singleton(ExchangeRateService::class, function() {
            return new ExchangeRateService(new \GuzzleHttp\Client([
                'headers' => [
                    'Content-Type'  => 'application/json',
                ]
            ]));
        });
    }
}
