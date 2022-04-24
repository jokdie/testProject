<?php
declare(strict_types=1);

namespace App\Services\LanguageService;

interface LanguageServiceInterface
{
    public function getId(): string;

    public function setLocale(string $language): void;

    public function isLang($language): bool;
}
