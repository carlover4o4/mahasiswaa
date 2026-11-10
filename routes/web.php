<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    //ADMIN
    Route::get('/admin/dataM', [AdminController::class, 'dataM'])->name('dataM');
    Route::get('/admin/dataP', [AdminController::class, 'dataP'])->name('dataP');

    Route::get('/admin/edit/{pendaftaran}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/admin/postedit/{pendaftaran}', [AdminController::class, 'postedit'])->name('postedit');

    Route::get('/admin/hapus/{pendaftaran}', [AdminController::class, 'hapus'])->name('hapus');

    
    //MAHASISWA
    Route::get('/mahasiswa/formDaftar', [MahasiswaController::class, 'formDaftar'])->name('formDaftar');
    Route::post('/mahasiswa/postformDaftar', [MahasiswaController::class, 'postformDaftar'])->name('postformDaftar');

    Route::get('/mahasiswa/daftarFakultas', [MahasiswaController::class, 'daftarFakultas'])->name('daftarFakultas');
    Route::get('/mahasiswa/detailProd/{prodi}', [MahasiswaController::class, 'detailProd'])->name('detailProd');
});