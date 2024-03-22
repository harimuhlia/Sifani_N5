<?php

use App\Http\Controllers\DashboardInboxController;
use App\Http\Controllers\DashboardInformasiController;
use App\Http\Controllers\DashboardLamaranController;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\DashboardLowonganController;
use App\Http\Controllers\DashboardLowonganTersediaController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardTestimoniController;
use App\Http\Controllers\DashboardVisidanmisiController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/lowongan', [LowonganController::class, 'lowongan']);
Route::get('/lowongan/{lowongan:slug}', [LowonganController::class, 'show']);

Route::get('/testimoni', [TestimoniController::class, 'testimoni']);
Route::get('/testimoni/{testimoni:id}', [TestimoniController::class, 'show']);

Route::resource('dashboard/inbox', DashboardInboxController::class);

// Harus Login
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware();

Route::middleware(['auth', 'CekRole:Administrator,Alumni'])->group(function () {
    Route::get('/informasi/{informasi:slug}', [InformasiController::class, 'show']);
    Route::get('/informasi', [InformasiController::class, 'informasi']);
    Route::resource('dashboard/testimoni', DashboardTestimoniController::class);
    Route::resource('dashboard/profil', DashboardProfilController::class);
});

Route::middleware(['auth', 'CekRole:Administrator'])->group(function () {
    Route::resource('/dashboard/lowongan', DashboardLowonganController::class);
    Route::resource('/dashboard/informasi', DashboardInformasiController::class);
    Route::resource('dashboard/visidanmisi', DashboardVisidanmisiController::class);
    // Route::resource('dashboard/inbox', DashboardInboxController::class);

    Route::get('/dashboard/pendaftar', [DataPendaftarController::class, 'index']);
    Route::get('/dashboard/pendaftar/{lowongan:slug}', [DataPendaftarController::class, 'pendaftar']);
    Route::get('/dashboard/pendaftar/print-pdf/{lowongan:slug}', [DataPendaftarController::class, 'printPdf']);
    route::get('/dashboard/pendaftar/exportexcel/{id}', [DataPendaftarController::class, 'exportexcel'])->name('exportexcel');
});

Route::middleware(['auth', 'CekRole:Alumni'])->group(function () {
    // Untuk Pendaftar
    Route::get('/dashboard/lowongan-tersedia/', [DashboardLowonganTersediaController::class, 'index']);
    Route::get('/dashboard/lowongan-tersedia/daftar/{lowongan:slug}', [DashboardLowonganTersediaController::class, 'daftar']);
    Route::POST('/dashboard/lowongan-tersedia', [DashboardLowonganTersediaController::class, 'store'])->name('store');

    Route::get('/dashboard/lamaran/', [DashboardLamaranController::class, 'index']);
    Route::get('/dashboard/lamaran/edit/{lowongan:slug}/', [DashboardLamaranController::class, 'edit']);
    Route::post('/dashboard/lamaran/', [DashboardLamaranController::class, 'update'])->name('update-lamaran');
    Route::delete('/dashboard/lamaran/{id}', [DashboardLamaranController::class, 'destroy']);
    Route::get('/dashboard/lamaran/cetak/{lowongan:slug}', [DashboardLamaranController::class, 'cetak']);
});

// Route::get('/dashboard/lowongan/checkSlug', [DashboardLowonganController::class, 'checkSlug']);
