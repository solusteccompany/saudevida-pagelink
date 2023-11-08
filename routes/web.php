<?php

use App\Http\Controllers\PageLinkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/cartao/{contract}', [PageLinkController::class, 'index'])->name('page.link');
Route::post('/cartao', [PageLinkController::class, 'store'])->name('save.link');

Route::get('/notfound', function () {
    return view('pages.not-found');
})->name('not.found');
