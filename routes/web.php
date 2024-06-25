<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    return view('dashboard')->name('dashboard');
    
});

require __DIR__.'/auth.php';
