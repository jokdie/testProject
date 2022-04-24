<?php
declare(strict_types=1);

namespace App\Services\TranslationService\Facade;

use Illuminate\Support\Facades\Facade;

class T extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'T';
    }
}
