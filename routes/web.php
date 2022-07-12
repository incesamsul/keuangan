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
Route::get('/bantuan', [General::class, 'bantuan']);


Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,staff,pimpinan']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/dashboard/{bulan}', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::post('/ubah_sandi', [General::class, 'ubahSandi']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
    Route::post('/set_periode_aktif', [General::class, 'setPeriodeAktif']);
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
Route::group(['middleware' => ['auth', 'ceklevel:staff,pimpinan']], function () {
    Route::group(['prefix' => 'staff'], function () {

        Route::get('/data_akun', [Staff::class, 'data_akun']);
        Route::get('/data_pemasok', [Staff::class, 'data_pemasok']);
        Route::get('/data_pelanggan', [Staff::class, 'data_pelanggan']);
        Route::get('/jurnal', [Staff::class, 'jurnal']);
        Route::get('/jurnal/{tahun}', [Staff::class, 'jurnal']);
        Route::get('/buku_besar', [Staff::class, 'buku_besar']);
        Route::get('/buku_besarPiutang', [Staff::class, 'buku_besarPiutang']);
        Route::get('/buku_besarUtang', [Staff::class, 'buku_besarUtang']);
        Route::get('/neraca_saldo', [Staff::class, 'neraca_saldo']);
        Route::get('/laba_rugi', [Staff::class, 'laba_rugi']);
        Route::get('/laporan_modal', [Staff::class, 'laporan_modal']);
        Route::get('/laporan_neraca', [Staff::class, 'laporan_neraca']);
        Route::get('/laporan_per_proyek', [Staff::class, 'laporan_per_proyek']);

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

        Route::get('/', 'Staff@pemasok')->name('root');
        Route::get('/pemasok/{id}/edit_dataPemasok', 'Staff@update_dataPemasok')->name('pemasok.update_dataPemasok');
        Route::post('/pemasok/{id}', 'Staff@edit_dataPemasok')->name('pemasok.edit_dataPemasok');
        Route::get('/pemasok/delete/{id}', [Staff::class, 'pemasokDelete'])->name('pemasok.delete');
        Route::post('/pemasok/update_dataPemasok/{id}', [Staff::class, 'update_dataPpemasok'])->name('pemasok.update_dataPemasok');

        Route::get('/', 'Staff@pelanggan')->name('root');
        Route::get('/pelanggan/{id}/edit_dataPelanggan', 'Staff@update_dataPelanggan')->name('pelanggan.update_dataPelanggan');
        Route::post('/pelanggan/{id}', 'Staff@edit_dataPelanggan')->name('pelanggan.edit_dataPelanggan');
        Route::get('/pelanggan/delete/{id}', [Staff::class, 'pelangganDelete'])->name('pelanggan.delete');
        Route::post('/pelanggan/update_dataPelanggan/{id}', [Staff::class, 'update_dataPelanggan'])->name('pelanggan.update_dataPelanggan');

        // TAMBAH
        Route::post('/tambah_akun', [Staff::class, 'tambah_akun']);
        Route::post('/tambah_pemasok', [Staff::class, 'tambah_pemasok']);
        Route::post('/tambah_pelanggan', [Staff::class, 'tambah_pelanggan']);
        Route::post('/tambah_akun', [Staff::class, 'tambah_akun']);
        Route::post('/tambah_transaksi', [Staff::class, 'tambah_transaksi']);

        // EDIT
        Route::post('/edit_akun', [Staff::class, 'edit_akun']);
        Route::post('/edit_pemasok', [Staff::class, 'edit_pemasok']);
        Route::post('/edit_pelanggan', [Staff::class, 'edit_pelanggan']);
        Route::post('/edit_transaksi', [Staff::class, 'edit_transaksi']);




        Route::get('jurnal/upload', 'Staff@form')->name('jurnal.form');
        Route::get('jurnal/index', 'Staff@index')->name('jurnal.index');
        Route::post('jurnal/upload', 'Staff@upload')->name('jurnal.upload');

        Route::get('akun/upload_akun', 'Staff@form')->name('akun.form');
        // Route::get('akun/index', 'Staff@index')->name('akun.index');
        // Route::post('akun/upload_akun', 'Staff@upload_akun')->name('akun.upload_akun');

        Route::get('akun/upload_dataPemasok', 'Staff@form')->name('pemasok.form');
        // Route::get('akun/index', 'Staff@index')->name('akun.index');
        // Route::post('akun/upload_akun', 'Staff@upload_akun')->name('akun.upload_akun');
        Route::get('akun/upload_dataPelanggan', 'Staff@form')->name('pelanggan.form');
        // Route::get('akun/index', 'Staff@index')->name('akun.index');
        // Route::post('akun/upload_akun', 'Staff@upload_akun')->name('akun.upload_akun');

        // CETAK HERE
        Route::get('/cetak_neraca_saldo', [Staff::class, 'cetakNeracaSaldo']);
        Route::get('/cetak_laba_rugi', [Staff::class, 'cetakLabaRugi']);
        Route::get('/cetak_laporan_modal', [Staff::class, 'cetakLaporanModal']);
        Route::get('/cetak_neraca', [Staff::class, 'cetakNeraca']);
    });
});

// PIMPINAN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:pimpinan']], function () {
    Route::group(['prefix' => 'pimpinan'], function () {

        Route::get('/laba_rugi', [Pimpinan::class, 'laba_rugi']);
        Route::get('/laporan_modal', [Pimpinan::class, 'laporan_modal']);
        Route::get('/laporan_neraca', [Pimpinan::class, 'laporan_neraca']);

        //CETAK HERE
        Route::get('/cetak_laba_rugi', [Pimpinan::class, 'cetakLabaRugi']);
        Route::get('/cetak_laporan_modal', [Pimpinan::class, 'cetakLaporanModal']);
        Route::get('/cetak_neraca', [Pimpinan::class, 'cetakNeraca']);
    });
});
