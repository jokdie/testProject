<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LanguageService\LanguageServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{
    protected LanguageServiceInterface $languageService;

    public function __construct(LanguageServiceInterface $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * @throws ValidationException
     */
    public function changeLocale(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'language' => 'required|string|alpha|size:2',
        ]);

        if (!$validator->fails()) {
            $locale = $validator->validated()['language'];

            $this->languageService->setLocale($locale);
        }
    }
}
