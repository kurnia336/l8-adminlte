<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ScannerController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::resource('customer', customerController::class);
Route::resource('barang', BarangController::class);
Route::resource('scanner', ScannerController::class);
// Route::get('/cari_provinsi', [customerController::class,'loadData_provinsi']);
// Route::get('/cari_kota', [customerController::class,'loadData_kota']);
// Route::get('/cari_kecamatan', [customerController::class,'loadData_kecamatan']);
// Route::get('/cari_kelurahan', [customerController::class,'loadData_kelurahan']);

Route::get('tambahCustomer/getcities/{id}',[customerController::class,'getCities']);
Route::get('tambahCustomer/getdistricts/{id}',[customerController::class,'getDistricts']);
Route::get('tambahCustomer/getsubdistricts/{id}',[customerController::class,'getSubdistricts']);
// Route::resources('customer', [App\Http\Controllers\customerController::class])->name('customer');
