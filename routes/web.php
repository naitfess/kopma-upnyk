<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PSDAController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store']);
Route::put('/pendaftaran/{id}/konfirmasi', [PendaftaranController::class, 'updateStatusKonfirmasi'])->middleware('auth');
Route::put('/pendaftaran/{id}/diterima', [PendaftaranController::class, 'updateStatusDiterima'])->middleware('auth');

Route::get('/pengumuman', [PengumumanController::class, 'index']);

Route::get('/psda/anggota', [PSDAController::class, 'showAnggota'])->middleware('auth');
Route::get('/psda/poin', [PSDAController::class, 'showPoin'])->middleware('auth');
Route::get('/psda/pendaftaran', [PSDAController::class, 'showPendaftaran'])->middleware('auth');
Route::post('/psda/anggota', [PSDAController::class, 'storeAnggota'])->middleware('auth');

Route::get('/keuangan/simpanan', [KeuanganController::class, 'showSimpanan'])->middleware('auth');
