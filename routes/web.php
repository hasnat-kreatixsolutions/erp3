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

    Route::get('manufacturers', [App\Http\Controllers\ManufacturerController::class, 'index'])->name('manufacturers.index');
    Route::get('manufacturers/create', [App\Http\Controllers\ManufacturerController::class, 'create'])->name('manufacturers.create');
    Route::post('manufacturers', [App\Http\Controllers\ManufacturerController::class, 'store'])->name('manufacturers.store');
    Route::get('manufacturers/{id}/edit', [App\Http\Controllers\ManufacturerController::class, 'edit'])->name('manufacturers.edit');
    Route::put('manufacturers/{id}', [App\Http\Controllers\ManufacturerController::class, 'update'])->name('manufacturers.update');
    Route::get('manufacturers/{id}', [App\Http\Controllers\ManufacturerController::class, 'destroy'])->name('manufacturers.destroy');

    Route::get('particulars', [App\Http\Controllers\ParticularController::class, 'index'])->name('particulars.index');
    Route::get('particulars/create', [App\Http\Controllers\ParticularController::class, 'create'])->name('particulars.create');
    Route::post('particulars', [App\Http\Controllers\ParticularController::class, 'store'])->name('particulars.store');
    Route::get('particulars/{id}/edit', [App\Http\Controllers\ParticularController::class, 'edit'])->name('particulars.edit');
    Route::put('particulars/{id}', [App\Http\Controllers\ParticularController::class, 'update'])->name('particulars.update');
    Route::get('particulars/{id}', [App\Http\Controllers\ParticularController::class, 'destroy'])->name('particulars.destroy');

    Route::get('machines', [App\Http\Controllers\MachineController::class, 'index'])->name('machines.index');
    Route::get('machines/create', [App\Http\Controllers\MachineController::class, 'create'])->name('machines.create');
    Route::post('machines', [App\Http\Controllers\MachineController::class, 'store'])->name('machines.store');
    Route::get('machines/{id}/edit', [App\Http\Controllers\MachineController::class, 'edit'])->name('machines.edit');
    Route::put('machines/{id}', [App\Http\Controllers\MachineController::class, 'update'])->name('machines.update');
    Route::get('machines/{id}', [App\Http\Controllers\MachineController::class, 'destroy'])->name('machines.destroy');

    Route::get('materials', [App\Http\Controllers\MaterialController::class, 'index'])->name('materials.index');
    Route::get('materials/create', [App\Http\Controllers\MaterialController::class, 'create'])->name('materials.create');
    Route::post('materials', [App\Http\Controllers\MaterialController::class, 'store'])->name('materials.store');
    Route::get('materials/{id}/edit', [App\Http\Controllers\MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('materials/{id}', [App\Http\Controllers\MaterialController::class, 'update'])->name('materials.update');
    Route::get('materials/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->name('materials.destroy');

    Route::get('product-types', [App\Http\Controllers\ProductTypeController::class, 'index'])->name('product-types.index');
    Route::get('product-types/create', [App\Http\Controllers\ProductTypeController::class, 'create'])->name('product-types.create');
    Route::post('product-types', [App\Http\Controllers\ProductTypeController::class, 'store'])->name('product-types.store');
    Route::get('product-types/{id}/edit', [App\Http\Controllers\ProductTypeController::class, 'edit'])->name('product-types.edit');
    Route::put('product-types/{id}', [App\Http\Controllers\ProductTypeController::class, 'update'])->name('product-types.update');
    Route::get('product-types/{id}', [App\Http\Controllers\ProductTypeController::class, 'destroy'])->name('product-types.destroy');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

require __DIR__ . '/auth.php';