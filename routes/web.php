<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperAdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard',[
        'title'=>'Dashboard'
    ]);
})->middleware('auth');
Route::get('/data-pasien', function () {
    return view('pasien.index',[
        'title' => 'Data Pasien'
    ]);
})->middleware('auth');
Route::get('/data-dokter', function () {
    return view('dokter.index',[
        'title' => 'Data Dokter'
    ]);
})->middleware('auth');
Route::get('/data-obat', function () {
    return view('obat.index',[
        'title'=>'Data Obat'
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
Route::get('/pasien/create', function () {
    return view('pasien.create',[
        'title'=>'Pasien'
    ]);
})->middleware('auth');

Route::get('/data-user',[SuperAdminController::class,'index'])->middleware('auth');
Route::get('/data-user/create',[SuperAdminController::class,'create']);
Route::post('/data-user/create',[SuperAdminController::class,'store']);
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

