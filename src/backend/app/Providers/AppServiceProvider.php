<?php

namespace App\Providers;

use App\Services\LanguageService\LanguageService;
use App\Services\TranslationService\TranslationService;
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
        $this->app->singleton(LanguageService::class, function ($app) {
            $locale = $app['config']['app.locale'];

            return new LanguageService($locale);
        });

        $this->app->singleton(TranslationService::class, function () {
            return new TranslationService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
