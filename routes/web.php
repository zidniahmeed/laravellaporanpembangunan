<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('home/login', [HomeController::class, 'login']);
Route::post('home/dologin', [HomeController::class, 'dologin']);
Route::get('home/daftar', [HomeController::class, 'daftar']);
Route::post('home/dodaftar', [HomeController::class, 'dodaftar']);

// Route::get('/kategori', [KategoriController::class,'index']);

Route::middleware(['authmiddleware'])->controller(AdminController::class)->group(function () {
    Route::get('admin', 'index');

    Route::get('admin/profile', 'profile');
    Route::get('admin/tambahprofile', 'tambahprofile');
    Route::post('admin/simpanprofile', 'simpanprofile');
    Route::get('admin/ubahprofile/{id}', 'ubahprofile');
    Route::post('admin/updateprofile/{id}', 'updateprofile');
    Route::get('admin/hapusprofile/{id}', 'hapusprofile');

    Route::get('admin/pengguna', 'pengguna');
    Route::get('admin/tambahpengguna', 'tambahpengguna');
    Route::post('admin/simpanpengguna', 'simpanpengguna');
    Route::get('admin/ubahpengguna/{id}', 'ubahpengguna');
    Route::post('admin/updatepengguna/{id}', 'updatepengguna');
    Route::get('admin/hapuspengguna/{id}', 'hapuspengguna');

    Route::get('admin/logout', 'logout');


    // Riwayat Pengaduan
    Route::get('admin/riwayatpengaduan', 'riwayatpengaduan');
    Route::get('admin/tambahpengaduan', 'tambahpengaduan');
    Route::post('admin/simpanpengaduan', 'simpanpengaduan');
    Route::get('admin/ubahpengaduan/{id}', 'ubahpengaduan');
    Route::post('admin/updatepengaduan/{id}', 'updatepengaduan');
    Route::get('admin/hapuspengaduan/{id}', 'hapuspengaduan');
    Route::get('admin/detailpengaduan/{id}', 'detailpengaduan');
    Route::post('admin/updatestatuspengaduan/{id}', 'updatestatuspengaduan');

    // Kategori
    Route::get('admin/kategori', 'kategori');
    Route::get('admin/tambahkategori', 'tambahkategori');
    Route::post('admin/simpankategori', 'simpankategori');
    Route::get('admin/ubahkategori/{id}', 'ubahkategori');
    Route::post('admin/updatekategori/{id}', 'updatekategori');
    Route::get('admin/hapuskategori/{id}', 'hapuskategori');
});
