<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;


use App\Http\Controllers\Staff;
use App\Http\Controllers\Pimpinan;

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



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);



Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,staff,pimpinan']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});

// STAFF ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:staff']], function () {
    Route::group(['prefix' => 'staff'], function () {

        Route::get('/data_akun', [Staff::class, 'data_akun']);
        Route::get('/data_pemasok', [Staff::class, 'data_pemasok']);
        Route::get('/data_pelanggan', [Staff::class, 'data_pelanggan']);
        Route::get('/jurnal', [Staff::class, 'jurnal']);
        Route::get('/buku_besar', [Staff::class, 'buku_besar']);
        Route::get('/neraca_saldo', [Staff::class, 'neraca_saldo']);
        Route::get('/laba_rugi', [Staff::class, 'laba_rugi']);
        Route::get('/laporan_modal', [Staff::class, 'laporan_modal']);
        Route::get('/laporan_neraca', [Staff::class, 'laporan_neraca']);

        Route::get('/', 'Staff@jurnal')->name('root');
        Route::get('/jurnal/{id}/edit', 'Staff@update')->name('jurnal.update');
        Route::post('/jurnal/{id}', 'Staff@edit')->name('jurnal.edit');
        Route::get('/jurnal/delete/{id}', [Staff::class, 'jurnalDelete'])->name('jurnal.delete');
        Route::post('/jurnal/update/{id}', [Staff::class, 'update'])->name('jurnal.update');

        Route::get('/', 'Staff@akun')->name('root');
        Route::get('/akun/{id}/edit_akun', 'Staff@update_akun')->name('akun.update_akun');
        Route::post('/akun/{id}', 'Staff@edit_akun')->name('akun.edit_akun');
        Route::get('/akun/delete/{id}', [Staff::class, 'akunDelete'])->name('akun.delete');
        Route::post('/akun/update_akun/{id}', [Staff::class, 'update_akun'])->name('akun.update_akun');

        Route::post('/tambah_akun', [Staff::class, 'tambah_akun']);
        Route::post('/tambah_pemasok', [Staff::class, 'tambah_pemasok']);
        Route::post('/tambah_pelanggan', [Staff::class, 'tambah_pelanggan']);
        Route::post('/tambah_transaksi', [Staff::class, 'tambah_transaksi']);

        Route::get('jurnal/upload', 'Staff@form')->name('jurnal.form');
        Route::get('jurnal/index', 'Staff@index')->name('jurnal.index');
        Route::post('jurnal/upload', 'Staff@upload')->name('jurnal.upload');

        Route::get('akun/upload_akun', 'Staff@form')->name('akun.form');
        // Route::get('akun/index', 'Staff@index')->name('akun.index');
        // Route::post('akun/upload_akun', 'Staff@upload_akun')->name('akun.upload_akun');
    });
});

// PIMPINAN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:pimpinan']], function () {
    Route::group(['prefix' => 'pimpinan'], function () {

        Route::get('/laba_rugi', [Pimpinan::class, 'laba_rugi']);
        Route::get('/laporan_modal', [Pimpinan::class, 'laporan_modal']);
        Route::get('/laporan_neraca', [Pimpinan::class, 'laporan_neraca']);
    });
});
