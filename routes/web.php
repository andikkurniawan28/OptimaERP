<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\BidangUsahaController;
use App\Http\Controllers\JenisKontakController;
use App\Http\Controllers\JenisOrganisasiController;
use App\Http\Controllers\JenisPihakKetigaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::resource('/kontak/jenis_kontak', JenisKontakController::class);
Route::resource('/kontak/jenis_pihak_ketiga', JenisPihakKetigaController::class);
Route::resource('/kontak/jenis_organisasi', JenisOrganisasiController::class);
Route::resource('/kontak/bidang_usaha', BidangUsahaController::class);
Route::resource('/kontak/departemen', DepartemenController::class);
