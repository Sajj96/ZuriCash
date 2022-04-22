<?php

namespace App\Providers;

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
    }
}
