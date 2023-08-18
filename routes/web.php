<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    
    Route::controller(BarangController::class)->prefix('barang')->group(function(){
        Route::get('', 'index')->name('barang');
        Route::get('tambah', 'tambah')->name('barang.tambah');
        Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('barang.edit');
        Route::post('edit/{id}', 'update')->name('barang.edit.update');
        Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
    });
    
    Route::controller(KategoriController::class)->prefix('kategori')->group(function(){
        Route::get('', 'index')->name('kategori');
        Route::get('tambah', 'tambah')->name('kategori.tambah');
        Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kategori.edit');
        Route::post('edit/{id}', 'update')->name('kategori.edit.update');
        Route::get('hapus/{id}', 'hapus')->name('kategori.hapus');
    });

});
