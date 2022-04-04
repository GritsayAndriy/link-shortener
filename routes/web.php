<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', HomeController::class)
        ->name('home');
    Route::post('/generate-link', GenerateLinkController::class)
        ->name('links.short.generate');
    Route::get('{link:token}', RedirectController::class)
        ->name('links.show');
});

