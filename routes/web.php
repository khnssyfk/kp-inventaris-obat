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
    return view('dashboard');
});
Route::get('/pasien', function () {
    return view('pasien.index');
});
Route::get('/dokter', function () {
    return view('dokter');
});
Route::get('/obat', function () {
    return view('obat');
});
Route::get('/rekam-medis', function () {
    return view('rekam-medis');
});

