<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventManagerController;
use App\Http\Controllers\EventOwnerController;
use App\Http\Controllers\EventRegisterController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/clear', function() {
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    return "Cleared!";
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('events', EventController::class);
Route::resource('event-registers', EventRegisterController::class);
Route::resource('people', PersonController::class);
Route::resource('event-managers', EventManagerController::class);
Route::resource('event-owners', EventOwnerController::class);
