<?php

use App\Http\Controllers\ShowingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/showings', [ShowingController::class, 'index'])->name('showings');
    Route::get('/showing-get-by-id', [ShowingController::class, 'ajaxShowing'])->name('showing.ajaxGet');
    Route::post('/showing/update', [ShowingController::class, 'updateShowing'])->name('showing.update');
    Route::get('/showing/cancel', [ShowingController::class, 'cancelShowing'])->name('showing.cancel');
});
