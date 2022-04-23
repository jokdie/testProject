<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TranslationService\T;

class MyFirstController extends MainController
{
    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request): string
    {
        $this->languageService->setLocale('en');

        echo T::_('Привет, Мир!');
        echo '<br>';
        echo T::_('Привет');

        return '';
    }
}
