<?php

use App\Http\Controllers\Pengadaan;
use App\Models\Pengadaan\Permintaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\_01Master\UangController;
use App\Http\Controllers\_01Master\MesinController;
use App\Http\Controllers\_03Gudang\StockController;
use App\Http\Controllers\_04Teknik\ReturController;
use App\Http\Controllers\_01Master\LockerController;
use App\Http\Controllers\_03Gudang\MutasiController;
use App\Http\Controllers\_03Gudang\SampleController;
use App\Http\Controllers\_04Teknik\ServisController;
use App\Http\Controllers\_01Master\SuplierController;
use App\Http\Controllers\_04Teknik\BarcodeController;
use App\Http\Controllers\_02Pengadaan\EmailController;
use App\Http\Controllers\Datatables\Teknik\ServisList;
use App\Http\Controllers\Pengaturan\PenggunaController;
use App\Http\Controllers\_01Master\BarangJasaController;
use App\Http\Controllers\_01Master\TarifPajakController;
use App\Http\Controllers\_03Gudang\PenerimaanController;
use App\Http\Controllers\_03Gudang\PengirimanController;
use App\Http\Controllers\_04Teknik\PengambilanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\_01Master\MasterBarangController;
use App\Http\Controllers\_02Pengadaan\PembelianController;
use App\Http\Controllers\_05Laporan\LaporanStokController;
use App\Http\Controllers\Datatables\Gudang\PenerimaanList;
use App\Http\Controllers\Datatables\Gudang\PengirimanList;
use App\Http\Controllers\_02Pengadaan\PermintaanController;
use App\Http\Controllers\_03Gudang\BarangTransitController;
use App\Http\Controllers\Datatables\Teknik\PengambilanList;
use App\Http\Controllers\_02Pengadaan\PersetujuanController;
use App\Http\Controllers\Datatables\Pengadaan\PembelianList;
use App\Http\Controllers\_02Pengadaan\StatusBarangController;
use App\Http\Controllers\Datatables\Pengadaan\PermintaanList;
use App\Http\Controllers\Datatables\Pengadaan\PersetujuanList;
use App\Http\Controllers\_05Laporan\LaporanPemakaianController;
use App\Http\Controllers\_05Laporan\LaporanPembelianController;

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
Route::resource('getPengambilan', PengambilanList::class);
Route::resource('getPembelianList', PembelianList::class);
Route::resource('tbPenerimaan', PenerimaanList::class);
Route::resource('getServis', ServisList::class);
Route::resource('getListPengiriman', PengirimanList::class);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// Rute Dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::get('getSearchEngine', 'CariBarangSearchEngine')->name('getSearchEngine');
});

//Rute Master
Route::controller(UangController::class)->group(function () {
    Route::get('/uang', 'index')->name('uang.index');
    Route::post('/uang/store', 'store')->name('uang.store');
    Route::put('/uang/update/{id}', 'update')->name('uang.update');
    Route::delete('/uang/destroy/{id}', 'destroy');
});

Route::controller(TarifPajakController::class)->group(function () {
    Route::get('/pajak', 'index')->name('pajak.index');
    Route::post('/pajak/store', 'store')->name('pajak.store');
    Route::put('/pajak/update/{id}', 'update')->name('pajak.update');
    Route::delete('/pajak/destroy/{id}', 'destroy');
});

Route::controller(SuplierController::class)->group(function () {
    Route::get('/suplier', 'index')->name('suplier.index');
    Route::post('/suplier/store', 'store')->name('suplier.store');
    Route::put('/suplier/update/{id}', 'update')->name('suplier.update');
    Route::delete('/suplier/destroy/{id}', 'destroy');
});

Route::controller(BarangJasaController::class)->group(function () {
    Route::get('/barang', 'index')->name('barangJasa.index');
    Route::post('/barang/store', 'store')->name('barang.store');
    Route::put('/barang/update/{id}', 'update')->name('barang.update');
    Route::delete('/barang/destroy/{id}', 'destroy');
});

Route::controller(MesinController::class)->group(function () {
    Route::get('/mesin', 'index')->name('mesin.index');
    Route::post('/mesin/store', 'store')->name('mesin.store');
    Route::put('/mesin/update/{id}', 'update')->name('mesin.update');
    Route::delete('/mesin/destroy/{id}', 'destroy');
    //---------------MASTER MESIN ITM-------------------------//
    Route::post('/itm/store', 'itmStore')->name('mesinitm.store');
    Route::put('/itm/update/{id}', 'itmUpdate')->name('itm.update');
    Route::delete('/itm/destroy/{id}', 'itmDestroy');
});

Route::controller(MasterBarangController::class)->group(function () {
    Route::get('/masterBarang', 'index')->name('masterBarang.index');
    Route::post('/masterBarang/store', 'store')->name('masterbarang.store');
    Route::put('/masterBarang/update/{id}', 'update')->name('masterbarang.update');
    Route::delete('/masterBarang/destroy/{id}', 'destroy');
});

Route::controller(LockerController::class)->group(function () {
    Route::get('/locker', 'index')->name('locker.index');
    Route::post('/locker/store', 'store')->name('locker.store');
    Route::put('/locker/update/{id}', 'update')->name('locker.update');
    Route::delete('/locker/destroy/{id}', 'destroy');
});

//Rute Pengadaaan
Route::controller(PermintaanController::class)->group(function () {
    // Ambil Data
    Route::get('getKabag', 'getKabag')->name('getKabag');
    Route::get('getMesin', 'getMesin')->name('getMesin');
    Route::get('getPemesan', 'getPemesan')->name('getPemesan');
    Route::get('getMasterBarang', 'getMasterBarang')->name('getMasterBarang');
    Route::get('getMasterPemesan', 'getMasterPemesan')->name('getMasterPemesan');
    // Permintaan
    Route::get('pengadaan/permintaan', 'permintaan')->name('pengadaan/permintaan');
    Route::post('storedataPermintaan', 'storePermintaan');
    Route::post('pengadaan/printPermintaan', 'printPermintaan')->name('pengadaan/printPermintaan');
    Route::post('pengadaan/viewPermintaan', 'viewPermintaan')->name('pengadaan/viewPermintaan');
    Route::post('pengadaan/viewEditPermintaan', 'viewEditPermintaan')->name('pengadaan/viewEditPermintaan');
    Route::post('pengadaan/permintaan/repeatOrder', 'repeatOrder')->name('pengadaan/permintaan/repeatOrder');
});

Route::controller(PersetujuanController::class)->group(function () {
    Route::get('pengadaan/persetujuan', 'persetujuan')->name('pengadaan/persetujuan');
    Route::post('/persetujuan/ajax_list_prosesQTY', 'ajax_list_prosesQTY')->name('proses.qty');
    Route::post('checkAccQty', 'checkAccQty');
    Route::post('checkAccept', 'checkAccept');

    Route::post('persetujuan/carihistory', 'cariRiwayat')->name('persetujuan/carihistory');
    Route::post('persetujuan/cariDetail', 'cariDetailbarang')->name('persetujuan/cariDetail');
    Route::post('getACCPermintaan', 'getACCPermintaan')->name('getACCPermintaan.index');
    Route::post('storeQtyPermintaan', 'storeQtyPermintaan')->name('storeQtyPermintaan');
    Route::post('storeAccPermintaan', 'storeAccPermintaan')->name('storeAccPermintaan');
});

Route::controller(EmailController::class)->group(function () {
    Route::get('pengadaan/email', 'email')->name('pengadaan/email');
});

Route::controller(PembelianController::class)->group(function () {
    Route::get('pengadaan/pembelian', 'pembelian');
    Route::post('getPembelian', 'getDataPembelian')->name('getPembelian.index');
    Route::post('getBayarServis', 'getDataServis')->name('getBayarServis.index');
    Route::post('getService', 'getDataService')->name('getService.index');
    Route::post('checkPembelian', 'checkPembelian');
    Route::post('storedataPembelian', 'storePembelian')->name('storedataPembelian');
});

Route::controller(StatusBarangController::class)->group(function () {
    Route::get('pengadaan/status_barang', 'statusBarang');
});

//ROUTE GUDANG
Route::controller(StockController::class)->group(function () {
    Route::get('gudang/stock', 'stock');
    Route::post('getstock', 'getStockBarang')->name('getstock');
});

Route::controller(PenerimaanController::class)->group(function () {
    Route::get('gudang/penerimaan', 'penerimaan');
    Route::post('checkPenerimaan', 'checkPenerimaan');
    Route::post('checkPartial', 'checkPartial');
    Route::post('storePenerimaan', 'storePenerimaanBarang')->name('storePenerimaan');
    Route::post('storePartial', 'storePartialBarang')->name('storePartial');
    Route::post('getPenerimaanCheck', 'getPenerimaanCheck')->name('getPenerimaanCheck');
    Route::post('getPartial', 'getPartial')->name('getPartial');
});

Route::controller(PengirimanController::class)->group(function () {
    Route::get('gudang/pengiriman', 'pengiriman');
    Route::post('getPengiriman', 'getDataPengiriman')->name('getPengiriman.index');
    Route::post('checkPengiriman', 'checkPengiriman');
    Route::post('storePengiriman', 'storePengirimanBarang')->name('storePengiriman');
});

Route::controller(SampleController::class)->group(function () {
    Route::get('gudang/sample', 'sample');
});

Route::controller(BarangTransitController::class)->group(function () {
    Route::get('gudang/barangtransit', 'barangTransit');
});

Route::controller(MutasiController::class)->group(function () {
    Route::get('gudang/mutasi', 'mutasi');
});

//ROUTE TEKNIK
Route::controller(ServisController::class)->group(function () {
    Route::get('getDataMesinServis', 'getMesin')->name('getDataMesinServis');
    Route::get('teknik/servis', 'servis');
    Route::post('storedataServis', 'storedataServis');
    Route::post('teknik/printServis', 'printServis')->name('teknik/printServis');
    Route::post('teknik/viewServis', 'viewServis')->name('teknik/viewServis');
});

Route::controller(ReturController::class)->group(function () {
    Route::get('teknik/retur', 'retur');
});

Route::controller(PengambilanController::class)->group(function () {
    Route::get('getDataMesinPengambilan', 'getMesin')->name('getDataMesinPengambilan');
    Route::get('teknik/pengambilan', 'pengambilan');
    Route::post('teknik/pengambilan/cariBarang', 'pencarianBarang')->name('teknik/pengambilan/cariBarang');
    Route::post('storedataPengambilan', 'storePengambilan');
});

//ROUTE LAPORAN

Route::controller(LaporanPemakaianController::class)->group(function () {
    Route::get('laporan/pemakaian', 'pemakaian');
});

Route::controller(LaporanPembelianController::class)->group(function () {
    Route::get('laporan/pembelian', 'pembelian');
});

Route::controller(LaporanStokController::class)->group(function () {
    Route::get('laporan/stok', 'stok');
});

//Rute Pengaturan

Route::controller(PenggunaController::class)->group(function () {
    Route::get('/pengguna', 'index');
    Route::post('/pengguna/store', 'store')->name('store.users');
    Route::put('/pengguna/update/{id}', 'update')->name('update.users');
    Route::put('/pengguna/reset/{id}', 'reset')->name('reset.users');
    Route::delete('/pengguna/destroy/{id}', 'destroy');
});
