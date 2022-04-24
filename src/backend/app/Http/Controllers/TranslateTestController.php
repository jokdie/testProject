<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TranslationService\Facade\T;

class TranslateTestController extends MainController
{
    public function index(): string
    {
        $this->languageService->setLocale('de');

        echo T::_('Привет, Мир!');
        echo '<br>';
        echo T::_('Привет');
        echo '<br>';
        echo T::_('Коля {0} {1}', [
            T::_('Привет'),
            2,
        ]);
        echo '<br>';
        echo T::_('Трактор {0} где {name}', [
            'Tommy',
            'name' => 'Gun',
        ]);
        echo '<br>';
        echo T::_('Трактор {long} где {name}', [
            'long' => 'Tommy',
            'name' => 'Gun',
        ]);
        echo '<br>';
        echo T::_('Прррр');

        return '';
    }
}
