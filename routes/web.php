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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/pengumuman', [PengumumanController::class, 'index']);
Route::post('/pengumuman', [PengumumanController::class, 'checkWithNim']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::put('/pendaftaran/{id}/confirm', [PendaftaranController::class, 'updateStatusConfirm'])->middleware('auth')->name('pendaftaran.confirm');
    Route::put('/pendaftaran/{id}/accept', [PendaftaranController::class, 'updateStatusAccepted'])->middleware('auth')->name('pendaftaran.accept');
    Route::put('/pendaftaran/{id}/reject', [PendaftaranController::class, 'updateStatusRejected'])->middleware('auth')->name('pendaftaran.reject');
    Route::delete('/pendaftaran/{id}/delete', [PendaftaranController::class, 'destroy'])->middleware('auth')->name('pendaftaran.delete');
    Route::get('/pendaftaran/moveToAnggota', [PendaftaranController::class, 'moveToAnggota'])->middleware('auth')->name('pendaftaran.moveToAnggota');
});

Route::get('/psda/anggota', [PSDAController::class, 'showAnggota'])->middleware('auth')->name('psda.anggota');
Route::post('/psda/anggota', [PSDAController::class, 'storeAnggota'])->middleware('auth')->name('psda.anggota.store');
Route::post('/psda/group', [PSDAController::class, 'storeLink'])->middleware('auth')->name('psda.group.store');
Route::get('/psda/anggota/{id}/edit', [PSDAController::class, 'editAnggota'])->middleware('auth')->name('psda.anggota.edit');
Route::put('/psda/anggota/{id}', [PSDAController::class, 'updateAnggota'])->middleware('auth')->name('psda.anggota.update');
Route::delete('/psda/anggota/{id}', [PSDAController::class, 'destroyAnggota'])->middleware('auth')->name('psda.anggota.delete');
Route::delete('/psda/grup/{id}', [PSDAController::class, 'deleteLink'])->middleware('auth')->name('psda.grup.delete');

Route::get('/psda/poin', [PSDAController::class, 'showPoin'])->middleware('auth')->name('psda.poin');
Route::get('/psda/poin/{id}/edit', [PSDAController::class, 'editPoin'])->middleware('auth')->name('psda.poin.edit');
Route::put('/psda/poin/{id}', [PSDAController::class, 'updatePoin'])->middleware('auth')->name('psda.poin.update');
Route::delete('/psda/poin/{id}', [PSDAController::class, 'destroyPoin'])->middleware('auth')->name('psda.poin.delete');

Route::get('/psda/pendaftaran', [PSDAController::class, 'showPendaftaran'])->middleware('auth')->name('psda.pendaftaran');

Route::get('/keuangan/simpanan', [KeuanganController::class, 'showSimpanan'])->middleware('auth')->name('keuangan.simpanan');

Route::post('/keuangan/sw', [KeuanganController::class, 'storeSimpananWajib'])->middleware('auth')->name('keuangan.sw.store');
Route::get('/keuangan/sw/{id}/edit', [KeuanganController::class, 'editSimpananWajib'])->middleware('auth')->name('keuangan.sw.edit');

Route::post('/keuangan/ssshusp', [KeuanganController::class, 'storeSSSHUSP'])->middleware('auth')->name('keuangan.ssshusp.store');
Route::get('/keuangan/ssshusp/{id}/edit', [KeuanganController::class, 'editSSSHUSP'])->middleware('auth')->name('keuangan.ssshusp.edit');

Route::get('/usaha/laporan-tahunan', function () {
    return view('usaha.total_lap-labarugi');
});
Route::get('/usaha/laporan-usaha', function () {
    return view('usaha.laporan-usaha');
});
Route::get('/usaha/update-harga', function () {
    return view('usaha.update-harga');
});
