<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BotUrlController;



// Cache Clear
Route::get('/clear-cache', function() {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
});



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/opt-out', [HomeController::class, 'optOut'])->name('opt-out');

Route::post('importExcel', [BotUrlController::class, 'importExcel'])->name('importExcel');
Auth::routes(['register' => false]);
Route::group(['middleware' =>'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/store', [SettingsController::class, 'store'])->name('home');
    Route::resource('settings', SettingsController::class);
    Route::post("compose-email", [SettingsController::class, "sendEmail"]);
});



