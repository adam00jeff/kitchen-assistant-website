<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RecepiesController;
use App\Http\Controllers\StocksController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::middleware(['auth', 'checkrole:admin'])->group(function (){
    Route::get('/admin_panel',[AdminController::class, 'index'])->name('admin_panel');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/stock',[StocksController::class, 'stock_index'])->name('stock');
    Route::get('/stock/suppliers',[StocksController::class, 'get_suppliers'])->name('suppliers');
    Route::get('/stocks/create', [StocksController::class, 'create'])->name('create_stock');
    Route::post('/stocks/confirm', [StocksController::class, 'confirm'])->name('confirm_stock');
    Route::post('/stock', [StocksController::class, 'store'])->name('store_stock');
    Route::delete('/stock/{stock}', [\App\Http\Controllers\StocksController::class, 'destroy_stock'])->name('destroy_stock');

    Route::get('/recepies',[RecepiesController::class, 'recepie_index'])->name('recepies');
    Route::get('/recepies/create',[RecepiesController::class, 'create'])->name('create_recepies');
    Route::post('/recepies', [RecepiesController::class, 'store'])->name('store_recepies');

    Route::get('/documents',[DocumentController::class, 'documents_index'])->name('documents');
    Route::get('/documents/create', [DocumentController::class, 'create_document'])->name('create_document');
    Route::post('/documents', [DocumentController::class, 'store_document'])->name('store_document');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
