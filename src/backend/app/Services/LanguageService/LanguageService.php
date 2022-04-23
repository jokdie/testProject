<?php
declare(strict_types=1);

namespace App\Services\LanguageService;

use Illuminate\Support\Facades\App;

class LanguageService
{
    private string $id;

    public function __construct(string $locale)
    {
        $this->id = $locale;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setLocale(string $language): void
    {
        $language = mb_strtolower($language);

        if (array_key_exists($language, LanguageConsts::LANGUAGES)) {
            $this->id = $language;
            App::setLocale($this->id);
            session(['locale' => $this->id]);
        }
    }

    public function isLang($language): bool {
        return $this->id === $language;
    }
}
