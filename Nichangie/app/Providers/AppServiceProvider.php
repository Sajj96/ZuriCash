<?php

namespace App\Providers;

use App\Services\PaymentService;
use App\Services\SMSService;
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

        $this->app->singleton(SMSService::class, function() {
            return new SMSService(new \GuzzleHttp\Client([
                'base_uri' => config('services.sms.uri'),
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => sprintf('Basic %s', config('services.sms.token')),
                    'Accept'        => 'application/json'
                ]
            ]));
        });

        $this->app->singleton(PaymentService::class, function() {
            return new PaymentService(new \GuzzleHttp\Client([
                'base_uri' => 'http://18.220.121.223:30001',
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ]
            ]));
        });
    }
}
