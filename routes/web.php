<?php

use App\Http\Controllers\DashboardController;
use App\Models\Role;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\StokObatController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ObatMasukTempController;
use App\Http\Controllers\ObatKeluarTempController;
use App\Http\Controllers\UpdatePasswordController;

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


Route::get('/rekam-medis', function () {
    return view('rekam-medis.index',[
        'title'=>'Rekam Medis'
    ]);
})->middleware('auth');

//farmasi    
Route::resource('/',DashboardController::class)->middleware('auth');
Route::resource('/data-dokter',DokterController::class)->middleware('auth');
Route::resource('/data-pasien',PasienController::class)->middleware('auth');
Route::resource('/nama-obat',DataObatController::class)->middleware('auth');
Route::resource('/obat-masuk',ObatMasukController::class)->middleware('auth');
Route::resource('/obat-masuk-temp',ObatMasukTempController::class)->middleware('auth');
Route::resource('/obat-keluar-temp',ObatKeluarTempController::class)->middleware('auth');
Route::resource('/obat-keluar',ObatKeluarController::class)->middleware('auth');
Route::resource('/stok-obat',StokObatController::class)->middleware('auth');
Route::get('/profile',[UpdatePasswordController::class,'index'])->name('profile.index')->middleware('auth');
Route::get('/profile/edit',[UpdatePasswordController::class,'store'])->name('profile.store')->middleware('auth');
Route::get('/data/{id}', [ObatMasukController::class, 'getDataMasuk'])->middleware('auth');
Route::get('/datatemp',[ObatMasukController::class, 'getDataTemp'])->middleware('auth');
Route::get('/obatkeluartemp',[ObatkeluarController::class, 'getDataTemp'])->middleware('auth');
Route::get('/temp/{id}', [ObatKeluarController::class, 'getDataMasuk'])->middleware('auth');


//laporan
Route::get('/lap-obt-msk',[LaporanController::class, 'lap_obt_msk'])->middleware('auth');
Route::get('/lap-dokter',[LaporanController::class, 'lap_dokter'])->middleware('auth');
Route::get('/lap-pasien',[LaporanController::class, 'lap_pasien'])->middleware('auth');
Route::get('/lap-obt-klr',[LaporanController::class, 'lap_obt_klr'])->middleware('auth');
Route::get('/lap-obt',[LaporanController::class, 'lap_obt'])->middleware('auth');
Route::get('/lap-stk-obt',[LaporanController::class, 'lap_stk_obt'])->middleware('auth');


//login logout
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

//admin
Route::resource('/data-user',SuperAdminController::class)->middleware('isAdmin');
// Route::group(['middleware' => ['isAdmin']], function () {
// });