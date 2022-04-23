<?php
declare(strict_types=1);

namespace App\Services\TranslationService;

use App\Services\LanguageService\LanguageConsts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TranslationService
{
    public function _($key = null, $replace = [], $locale = null): ?string
    {
        if (is_null($key)) {
            return $key;
        }

        if (!Lang::has($key)) {
            if (App::getLocale() === LanguageConsts::CODE_RU) {
                return trans($key, $replace, $locale);
            }

            return trans($key, $replace, LanguageConsts::CODE_EN);
        }

        return trans($key, $replace, $locale);
    }
}
