<?php

namespace App\Providers;

use App\Services\CountryService\CountryService;
use App\Services\CountryService\CountryServiceInterface;
use App\Services\LanguageService\LanguageConsts;
use App\Services\LanguageService\LanguageService;
use App\Services\LanguageService\LanguageServiceInterface;
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
        $this->app->singleton(LanguageServiceInterface::class, function ($app) {
            $currentLocale = $app['config']['app.locale'];
            $locale = empty($currentLocale) ? LanguageConsts::CODE_RU : $currentLocale;

            return new LanguageService($locale);
        });

        $this->app->singleton(CountryServiceInterface::class, function ($app) {
            // todo: реализация получения айпи юзера -> получение кода страны
            $country = 'ru';

            return new CountryService($country);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('T', TranslationService::class);
    }
}
