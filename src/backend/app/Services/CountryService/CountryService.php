<?php
declare(strict_types=1);

namespace App\Services\CountryService;

class CountryService implements CountryServiceInterface
{
    private string $id;

    public function __construct(string $country)
    {
        $this->id = $country;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isCountry(string $country): bool {
        return $this->id === $country;
    }
}
