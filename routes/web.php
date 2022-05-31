<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DataObatController;

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

Route::get('/', function () {
    return view('dashboard',[
        'title'=>'Dashboard'
    ]);
})->middleware('auth');

Route::get('/rekam-medis', function () {
    return view('rekam-medis.index',[
        'title'=>'Rekam Medis'
    ]);
})->middleware('auth');
Route::get('/profile', function () {
    return view('profile',[
        'title'=>'Profile'
    ]);
})->middleware('auth');


// Route::resource('/data-obat',obatController::class)->middleware('auth');
Route::resource('/data-dokter',DokterController::class)->middleware('auth');
Route::resource('/data-pasien',PasienController::class)->middleware('auth');
Route::resource('/data-user',SuperAdminController::class)->middleware('auth');
Route::resource('/nama-obat',DataObatController::class)->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

