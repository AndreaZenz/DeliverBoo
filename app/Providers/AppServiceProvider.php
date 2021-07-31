<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

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
    // public function boot()
    // {
    //     \Braintree_Configuration::environment(env('BTREE_ENVIRONMENT'));
    //     \Braintree_Configuration::merchantId(env('BTREE_MERCHANT_ID'));
    //     \Braintree_Configuration::publicKey(env('BTREE_PUBLIC_KEY'));
    //     \Braintree_Configuration::privateKey(env('BTREE_PRIVATE_KEY'));
    // }

    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SampleChart::class
        ]);
    }
}
