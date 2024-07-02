<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard')->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    
    Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::get('customers/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::get('vendors', [App\Http\Controllers\VendorController::class, 'index'])->name('vendors.index');
    Route::get('vendors/create', [App\Http\Controllers\VendorController::class, 'create'])->name('vendors.create');
    Route::post('vendors', [App\Http\Controllers\VendorController::class, 'store'])->name('vendors.store');
    Route::get('vendors/{id}/edit', [App\Http\Controllers\VendorController::class, 'edit'])->name('vendors.edit');
    Route::put('vendors/{id}', [App\Http\Controllers\VendorController::class, 'update'])->name('vendors.update');
    Route::get('vendors/{id}', [App\Http\Controllers\VendorController::class, 'destroy'])->name('vendors.destroy');

    Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
    Route::get('departments/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('departments.create');
    Route::post('departments', [App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');
    Route::get('departments/{id}/edit', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('departments/{id}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('departments.update');
    Route::get('departments/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments.destroy');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

require __DIR__.'/auth.php';
