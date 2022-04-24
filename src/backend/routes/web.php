<?php

use App\Http\Controllers\TranslateTestController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (Request $request) {
    dd($request);
});

Route::get('/translate', [TranslateTestController::class, 'index']);

Route::get('/change-locale', [MainController::class, 'changeLocale'])->name('locale');
