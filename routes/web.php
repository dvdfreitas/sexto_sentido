<?php

use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'loadHomePage']);
Route::get('/home', [Controller::class, 'loadHomePage'])->name('home');
Route::get('/welcome', [Controller::class, 'loadHomePage'])->name('welcome');

Route::get('/stories', function () {
    return view('stories.index');
})->name('stories.index');

Route::get('/stories/create', function () {
    return view('stories.create');
})->name('stories.create');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
