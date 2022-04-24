<?php
declare(strict_types=1);

namespace App\Services\CountryService;

interface CountryServiceInterface
{
    public function getId(): string;

    public function isCountry(string $country): bool;
}
