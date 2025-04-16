<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\FormPernyataanController;
use App\Http\Controllers\TeguranTertulisController;
use App\Http\Controllers\SuratPeringatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('divisis', DivisiController::class);
Route::resource('karyawans', KaryawanController::class);
Route::resource('form-pernyataans', FormPernyataanController::class);
Route::resource('teguran-tertulis', TeguranTertulisController::class);
Route::resource('surat-peringatans', SuratPeringatanController::class);