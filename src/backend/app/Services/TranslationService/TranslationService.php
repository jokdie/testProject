<?php
declare(strict_types=1);

namespace App\Services\TranslationService;

use App\Services\LanguageService\LanguageConsts;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TranslationService
{
    public function _(string $strForTranslate, array $dynamicData = []): string
    {
        if (!Lang::has($strForTranslate)) {
            if (App::getLocale() === LanguageConsts::CODE_RU) {
                $translatedStr = trans($strForTranslate, [], null);
            } else {
                $translatedStr = trans($strForTranslate, [], LanguageConsts::CODE_EN);
            }
        } else {
            $translatedStr = trans($strForTranslate, [], null);
        }

        if (!empty($dynamicData)) {
            $replacesData = array_map(function ($replaceDataKey): string {
                return "{{$replaceDataKey}}";
            }, array_keys($dynamicData));

            $translatedStr = str_replace($replacesData, $dynamicData, $translatedStr);
        }

        return $translatedStr;
    }
}
