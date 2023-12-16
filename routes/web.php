<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::controller(InventoryItemController::class)->prefix('inventory')->group(function () {
        Route::get('/', 'index')->name('inventory.index');
        Route::get('/create', 'create')->name('inventory.create');
        Route::post('/store', 'store')->name('inventory.store');
        Route::get('/edit/{inventory}', 'edit')->name('inventory.edit');
        Route::put('/update/{inventory}', 'update')->name('inventory.update');
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
    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('/', 'index')->name('orders.index');
        Route::get('/create', 'create')->name('orders.create');
        Route::post('/store', 'store')->name('orders.store');
        Route::get('/edit/{order}', 'edit')->name('orders.edit');
        Route::put('/update/{order}', 'update')->name('orders.update');
    });
    Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
        Route::get('/', 'index')->name('invoices.index');
        Route::get('/create', 'create')->name('invoices.create');
        Route::post('/store', 'store')->name('invoices.store');
        Route::get('/edit/{invoice}', 'edit')->name('invoices.edit');
        Route::put('/update/{invoice}', 'update')->name('invoices.update');
    });
    Route::controller(ReportController::class)->prefix('reports')->group(function () {
        Route::get('/', 'index')->name('reports.index');
        Route::get('/report/{type}', 'show')->name('reports.edit');
    });

});
