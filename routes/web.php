<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\VendorInvoiceController;


Route::get('', [LoginController::class, 'login'])->name('login');
Route::post('/store', [LoginController::class, 'store'])->name('store');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


//Party route
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
Route::delete('/delete-parties/{id}', [PartyController::class, 'destroyParty'])->name('delete-parties');
Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');

//Gst bill routes
Route::get('/add-gst-bill', [GstBillController::class, 'addGstBill'])->name('add-gst-bill');
Route::get('/manage-gst-bills', [GstBillController::class, 'index'])->name('manage-gst-bills');
Route::get('/print-gst-bill/{id}', [GstBillController::class, 'print'])->name('print-gst-bill');
Route::post('/create-gst-bill', [GstBillController::class, 'creategstBill'])->name('create-gst-bill');


Route::get('/vendor-invoice', [VendorInvoiceController::class, 'create'])->name('create-vendor');
Route::post('/vendor-invoice', [VendorInvoiceController::class, 'store'])->name('vendor-invoice.store');
Route::get('/vendor-invoic/{id}', [VendorInvoiceController::class, 'show'])->name('vendor-invoice.show');
Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');
Route::get('/delete/{table}/{id}', [AppController::class, 'delete'])->name('delete');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
