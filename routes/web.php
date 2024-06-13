<?php

use App\Http\Controllers\Pengadaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Datatables\Pengadaan\PermintaanList;
use App\Http\Controllers\Master\BarangJasaController;
use App\Http\Controllers\Master\LockerController;
use App\Http\Controllers\Master\MasterBarangController;
use App\Http\Controllers\Master\MesinController;
use App\Http\Controllers\Master\SuplierController;
use App\Http\Controllers\Master\TarifPajakController;
use App\Http\Controllers\Master\UangController;
use App\Http\Controllers\Pengaturan\PenggunaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('login');
});

Route::resource('getPermintaan', PermintaanList::class);


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Rute Master
Route::controller(UangController::class)->group(function () {
    Route::get('/uang', 'index')->name('uang.index');
    Route::post('/uang/store', 'store')->name('uang.store');
    Route::put('/uang/update/{id}', 'update')->name('uang.update');
    Route::delete('/uang/destroy/{id}', 'destroy');
});

Route::controller(TarifPajakController::class)->group(function () {
    Route::get('/pajak', 'index');
    Route::post('/pajak/store', 'store')->name('pajak.store');
    Route::put('/pajak/update/{id}', 'update')->name('pajak.update');
    Route::delete('/pajak/destroy/{id}', 'destroy');
});

Route::controller(SuplierController::class)->group(function () {
    Route::get('/suplier', 'index');
    Route::post('/suplier/store', 'store')->name('suplier.store');
    Route::put('/suplier/update/{id}', 'update')->name('suplier.update');
    Route::delete('/suplier/destroy/{id}', 'destroy');
});

Route::controller(BarangJasaController::class)->group(function () {
    Route::get('/barang', 'index');
    Route::post('/barang/store', 'store')->name('barang.store');
    Route::put('/barang/update/{id}', 'update')->name('barang.update');
    Route::delete('/barang/destroy/{id}', 'destroy');
});

Route::controller(MesinController::class)->group(function () {
    Route::get('/mesin', 'index');
    Route::post('/mesin/store', 'store')->name('mesin.store');
    Route::put('/mesin/update/{id}', 'update')->name('mesin.update');
    Route::delete('/mesin/destroy/{id}', 'destroy');
    //---------------MASTER MESIN ITM-------------------------//
    Route::post('/itm/store', 'itmStore')->name('mesinitm.store');
    Route::put('/itm/update{id}', 'itmUpdate')->name('mesinitm.update');
    Route::post('/itm/destroy/{id}', 'itmDestroy');
});

Route::controller(MasterBarangController::class)->group(function () {
    Route::get('/masterBarang', 'index');
    Route::post('/masterBarang/store', 'store')->name('masterbarang.store');
    Route::put('/masterBarang/update/{id}', 'update')->name('masterbarang.update');
    Route::delete('/masterBarang/destroy/{id}', 'destroy');
});

Route::controller(LockerController::class)->group(function () {
    Route::get('/locker', 'index');
    Route::post('/locker/store', 'store')->name('locker.store');
    Route::put('/locker/update/{id}', 'update')->name('locker.update');
    Route::delete('/locker/destroy/{id}', 'destroy');
    Route::get('/locker/download', 'download')->name('locker.download');
});

//Rute Pengadaaan
Route::controller(Pengadaan::class)->group(function () {
    Route::get('pengadaan/permintaan', 'permintaan')->name('pengadaan/permintaan');
    Route::post('storedataPermintaan', 'storePermintaan');
    Route::get('getKabag', 'getKabag')->name('getKabag');
});

//Rute Pengaturan

Route::controller(PenggunaController::class)->group(function () {
    Route::get('/pengguna', 'index');
    Route::post('/pengguna/store', 'store')->name('store.users');
    Route::put('/pengguna/update/{id}', 'update')->name('update.users');
    Route::put('/pengguna/reset/{id}', 'reset')->name('reset.users');
    Route::delete('/pengguna/destroy/{id}', 'destroy');
});
