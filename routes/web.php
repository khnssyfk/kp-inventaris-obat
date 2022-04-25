<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard',[
        'title'=>'Dashboard'
    ]);
});
Route::get('/pasien', function () {
    return view('pasien.index',[
        'title' => 'Data Pasien'
    ]);
});
Route::get('/dokter', function () {
    return view('dokter.index',[
        'title' => 'Data Dokter'
    ]);
});
Route::get('/obat', function () {
    return view('obat.index',[
        'title'=>'Data Obat'
    ]);
});
Route::get('/rekam-medis', function () {
    return view('rekam-medis.index',[
        'title'=>'Rekam Medis'
    ]);
});
Route::get('/profile', function () {
    return view('profile',[
        'title'=>'Profile'
    ]);
});
Route::get('/login', function () {
    return view('auth.login');
});

