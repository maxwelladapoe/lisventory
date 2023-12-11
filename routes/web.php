<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InventoryItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::controller(InventoryItemController::class)->prefix('inventory')->group(function () {
        Route::get('/', 'index')->name('inventory.index');
        Route::get('/create', 'create')->name('inventory.create');
        Route::post('/store', 'store')->name('inventory.store');
    });


    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('/', 'index')->name('customers.index');
        Route::get('/create', 'create')->name('customers.create');
        Route::post('/store', 'store')->name('customers.store');
        Route::get('/edit/{customer}', 'edit')->name('customers.edit');
        Route::put('/update/{customer}', 'update')->name('customers.update');
    });

    Route::controller(SupplierController::class)->prefix('suppliers')->group(function () {
        Route::get('/', 'index')->name('suppliers.index');
        Route::get('/create', 'create')->name('suppliers.create');
        Route::post('/store', 'store')->name('supplier.store');
        Route::get('/edit/{supplier}', 'edit')->name('suppliers.edit');
        Route::put('/update/{supplier}', 'update')->name('suppliers.update');
    });
});
