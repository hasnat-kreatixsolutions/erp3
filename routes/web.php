<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('dashboard')->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    
    Route::resource('customers', CustomerController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

require __DIR__.'/auth.php';
