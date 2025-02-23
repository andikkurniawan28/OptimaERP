<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\BidangUsahaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisKontakController;
use App\Http\Controllers\JenisOrganisasiController;
use App\Http\Controllers\JenisPihakKetigaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PendidikanTerakhirController;
use App\Http\Controllers\PihakKetigaController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\StatusKaryawanController;
use App\Http\Controllers\StatusPerkawinanController;
use App\Http\Controllers\WilayahController;

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
Route::resource('/kontak/bank', BankController::class);
Route::resource('/kontak/wilayah', WilayahController::class);
Route::resource('/kontak/organisasi', OrganisasiController::class);
Route::resource('/kontak/pihak_ketiga', PihakKetigaController::class);

Route::resource('/personalia/departemen', DepartemenController::class);
Route::resource('/personalia/seksi', SeksiController::class);
Route::resource('/personalia/jabatan', JabatanController::class);
Route::resource('/personalia/status_karyawan', StatusKaryawanController::class);
Route::resource('/personalia/status_perkawinan', StatusPerkawinanController::class);
Route::resource('/personalia/agama', AgamaController::class);
Route::resource('/personalia/pendidikan_terakhir', PendidikanTerakhirController::class);
Route::resource('/personalia/jurusan', JurusanController::class);
Route::resource('/personalia/keahlian', KeahlianController::class);
Route::resource('/personalia/karyawan', KaryawanController::class);
