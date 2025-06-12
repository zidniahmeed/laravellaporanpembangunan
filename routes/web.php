<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\LaporanController;
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

    Route::get('admin/pengguna/{role}', 'pengguna');
    Route::get('admin/tambahpengguna/{role}', 'tambahpengguna');
    Route::post('admin/simpanpengguna', 'simpanpengguna');
    Route::get('admin/ubahpengguna/{id}', 'ubahpengguna');
    Route::post('admin/updatepengguna/{id}', 'updatepengguna');
    Route::get('admin/hapuspengguna/{id}', 'hapuspengguna');

    Route::get('admin/logout', 'logout');

});
Route::resource('kelurahan', KelurahanController::class)->middleware(['authmiddleware']);
Route::get('api/kabupaten', [KelurahanController::class, 'getCities'])->name('api.kabupaten');
Route::resource('laporan', LaporanController::class)->middleware(['authmiddleware']);
Route::get('home/kelurahan', [KelurahanController::class,'kelurahan']);
Route::get('detail-kelurahan/{id}', [KelurahanController::class,'detailkelurahan']);


