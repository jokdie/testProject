<?php
declare(strict_types=1);

namespace App\Services\TranslationService;

use App\Services\LanguageService\LanguageConsts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TranslationService
{
    public function _(string $strForTranslate, array $replaces = []): string
    {
        $targets = array_keys($replaces);

        if (!Lang::has($strForTranslate)) {
            if (App::getLocale() === LanguageConsts::CODE_RU) {
                $translatedStr = trans($strForTranslate, [], null);
            } else {
                $translatedStr = trans($strForTranslate, [], LanguageConsts::CODE_EN);
            }
        } else {
            $translatedStr = trans($strForTranslate, [], null);
        }

        foreach ($targets as &$target) {
            $target = "{{$target}}";
        }

        return str_replace($targets, $replaces, $translatedStr);
    }
}
