<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RecipesController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard',[DocumentController::class, 'welcome'])->name('welcome')->middleware(['auth', 'verified']);

Route::middleware(['auth', 'checkrole:admin'])->group(function (){
    Route::get('/admin_panel',[AdminController::class, 'index'])->name('admin_panel');
    Route::delete('/business/{business}', [BusinessController::class, 'destroy_business'])->name('destroy_business');
    Route::delete('/users/{user}', [UserController::class, 'destroy_user'])->name('destroy_user');

});

Route::middleware(['auth', 'verified'])->group(function () {
    //stock
    Route::get('/stock',[StocksController::class, 'stock_index'])->name('stock');
    Route::get('/stocks/create', [StocksController::class, 'create'])->name('create_stock');
    Route::post('/stocks/confirm', [StocksController::class, 'confirm'])->name('confirm_stock');
    Route::post('/stock', [StocksController::class, 'store'])->name('store_stock');
    Route::delete('/stock/{stock}', [StocksController::class, 'destroy_stock'])->name('destroy_stock');
    //recipes
    Route::get('/recipes',[RecipesController::class, 'recipes_index'])->name('recipes');
    Route::get('/recipes/create',[RecipesController::class, 'create_recipe'])->name('create_recipes');
    Route::post('/recipes', [RecipesController::class, 'store_recipe'])->name('store_recipes');
    Route::delete('/recipes/{recipe}', [RecipesController::class, 'destroy_recipe'])->name('destroy_recipe');
    //documents
    Route::get('/documents',[DocumentController::class, 'documents_index'])->name('documents');
    Route::get('/documents/create', [DocumentController::class, 'create_document'])->name('create_document');
    Route::post('/documents', [DocumentController::class, 'store_document'])->name('store_document');
    Route::get('/documents/overduedocuments',[DocumentController::class, 'overdue_documents'])->name('overduedocuments');
    Route::get('/documents/upcomingdocuments',[DocumentController::class, 'upcoming_documents'])->name('upcomingdocuments');
    //suppliers
    Route::get('/suppliers',[SupplierController::class, 'suppliers_index'])->name('suppliers');
    Route::get('/suppliers/create',[SupplierController::class, 'create_supplier'])->name('create_supplier');
    Route::post('/suppliers', [SupplierController::class, 'store_supplier'])->name('store_supplier');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy_supplier'])->name('destroy_supplier');
    //compliance
    Route::get('/compliance',[ComplianceController::class, 'compliance_index'])->name('compliance');
    Route::get('/compliance/supplierreports',[ComplianceController::class, 'supplier_reports'])->name('supplierreport');
    Route::get('/compliance/allergeninformation',[ComplianceController::class, 'allergen_information'])->name('allergeninformation');
    Route::get('/compliance/stafftraining',[ComplianceController::class, 'staff_training'])->name('stafftraining');
    //incident reports
    Route::get('/incidentreports',[IncidentreportController::class, 'incident_reports'])->name('incidentreports');
    Route::get('/incidentreports/create',[IncidentreportController::class, 'create_incidentreport'])->name('create_incidentreport');
    Route::post('/incidentreports', [IncidentreportController::class, 'store_incidentreport'])->name('store_incidentreport');
    Route::delete('/incidentreports/{incidentreport}', [IncidentreportController::class, 'destroy_incidentreport'])->name('destroy_incidentreport');
    Route::get('/incidentreports/recentincidents',[IncidentReportController::class,'recent_incidents'])->name('recentincidents');
    //contacts
    Route::get('/contactslist',[ContactController::class, 'contact_information'])->name('contactslist');
    Route::get('/contactslist/create',[ContactController::class, 'create_contact'])->name('create_contact');
    Route::post('/contactslist', [ContactController::class, 'store_contact'])->name('store_contact');
    Route::delete('/contactslist/{contact}', [ContactController::class, 'destroy_contact'])->name('destroy_contact');
    //search
    Route::get('/compliance/allergensearch',[ComplianceController::class, 'allergen_search'])->name('allergensearch');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
