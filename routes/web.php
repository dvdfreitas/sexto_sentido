<?php

use App\Http\Controllers\PairController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\RaceParticipantController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::loginUsingId(1);

Route::get('/', function () {    
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/{user:username}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create')->middleware('auth');

Route::get('/races', [RaceController::class, 'index'])->name('races.index');
Route::get('/races/{id}', [RaceController::class, 'show'])->name('races.show');
Route::post('/races/{id}', [RaceController::class, 'store'])->name('races.store')->middleware('auth');
Route::delete('/races/{id}', [RaceController::class, 'delete'])->name('races.delete')->middleware('auth');

Route::get('/pairs', [PairController::class, 'index'])->name('pairs.index')->middleware('auth');
Route::post('/pairs', [PairController::class, 'store'])->name('pairs.store')->middleware('auth');
Route::delete('/pairs', [PairController::class, 'delete'])->name('pairs.delete')->middleware('auth');

Route::get('/registrations', [RaceParticipantController::class, 'index'])->name('registrations.index')->middleware('auth');
