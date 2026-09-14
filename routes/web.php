<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BidangController;

use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Auth\LoginController;

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get('/profil', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

Route::get('/bidang', [BidangController::class, 'index'])->name('bidang.index');
Route::get('/bidang/{slug}', [BidangController::class, 'show'])->name('bidang.show');


Route::get('/layanan-publik', [\App\Http\Controllers\LayananPublikController::class, 'index'])->name('layanan.index');
Route::resource('/layanan', Admin\LayananPublikController::class)->parameters(['layanan' => 'service'])->except(['show']);

Route::get('/regulasi', [\App\Http\Controllers\RegulasiController::class, 'index'])->name('regulasi.index');
Route::get('/regulasi/download', [\App\Http\Controllers\RegulasiController::class, 'download'])->name('regulasi.download');

// ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard Utama
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Pesan
    Route::get('/contact', [Admin\ContactMessageController::class, 'index'])->name('contact.index');
    Route::get('/contact/{contactMessage}', [Admin\ContactMessageController::class, 'show'])->name('contact.show');
    Route::post('/contact/{contactMessage}/read', [Admin\ContactMessageController::class, 'markAsRead'])->name('contact.markAsRead');
    Route::delete('/contact/{contactMessage}', [Admin\ContactMessageController::class, 'destroy'])->name('contact.destroy');

    // Manajemen Postingan Instagram
    Route::post('/instagram/{instagram}/toggle', [Admin\InstagramPostController::class, 'toggleActive'])->name('instagram.toggle');
    Route::resource('/instagram', Admin\InstagramPostController::class)->except(['show']);

    // Manajemen Layanan (Services)
    Route::post('/layanan/{id}/restore', [Admin\LayananPublikController::class, 'restore'])->name('layanan.restore');
    Route::resource('/layanan', Admin\LayananPublikController::class)->parameters(['layanan' => 'service'])->except(['show']);

});

// LOGIN ADMIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


