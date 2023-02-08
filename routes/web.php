<?php

use App\Http\Controllers\ProfileController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/stock',[\App\Http\Controllers\StocksController::class, 'stock_index'])->name('stock');
    Route::get('/stocks/create', [\App\Http\Controllers\StocksController::class, 'create'])->name('create_stock');
    Route::post('/stock', [\App\Http\Controllers\StocksController::class, 'store'])->name('store_stock');

    Route::get('/recepies',[\App\Http\Controllers\RecepiesController::class, 'recepie_index'])->name('recepies');
    Route::get('/recepies/create',[\App\Http\Controllers\RecepiesController::class, 'create'])->name('create_recepies');
    Route::post('/recepies', [\App\Http\Controllers\RecepiesController::class, 'store'])->name('store_recepies');

    Route::get('/documents',[\App\Http\Controllers\DocumentController::class, 'documents_index'])->name('documents');
    Route::get('/documents/create', [\App\Http\Controllers\DocumentController::class, 'create'])->name('create_document');
    Route::post('/documents', [\App\Http\Controllers\DocumentController::class, 'store'])->name('store_document');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
