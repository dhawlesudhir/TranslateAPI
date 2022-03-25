<?php

namespace App\Providers;

use App\GoogleTranslator;
use Illuminate\Support\ServiceProvider;

class TranslateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return GoogleTranslator()
     */
    public function register()
    {
        $this->app->bind(GoogleTranslator::class,function($app){
            return new GoogleTranslator('en',env('googlekey'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
