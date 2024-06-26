<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('customers', CustomerController::class);

    return view('dashboard')->name('dashboard');
    
});

require __DIR__.'/auth.php';
