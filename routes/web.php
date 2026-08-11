<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstagramPostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Auth\LoginController;

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/news', [InstagramPostController::class, 'index'])->name('news.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/layanan-publik', [\App\Http\Controllers\LayananPublikController::class, 'index'])->name('layanan.index');

Route::get('/regulasi', [\App\Http\Controllers\RegulasiController::class, 'index'])->name('regulasi.index');
Route::get('/regulasi/download', [\App\Http\Controllers\RegulasiController::class, 'download'])->name('regulasi.download');

// ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard Utama
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Pesan Kontak (Contact Messages)
    Route::get('/contact', [Admin\ContactMessageController::class, 'index'])->name('contact.index');
    Route::get('/contact/{contactMessage}', [Admin\ContactMessageController::class, 'show'])->name('contact.show');
    Route::post('/contact/{contactMessage}/read', [Admin\ContactMessageController::class, 'markAsRead'])->name('contact.markAsRead');
    Route::delete('/contact/{contactMessage}', [Admin\ContactMessageController::class, 'destroy'])->name('contact.destroy');

    // Manajemen Postingan Instagram
    Route::post('/instagram/{instagram}/toggle', [Admin\InstagramPostController::class, 'toggleActive'])->name('instagram.toggle');
    Route::resource('/instagram', Admin\InstagramPostController::class)->except(['show']);

    // Manajemen Layanan (Services)
    Route::post('/services/{id}/restore', [Admin\ServiceController::class, 'restore'])->name('services.restore');
    Route::resource('/services', Admin\ServiceController::class)->except(['show']);

    // Manajemen Portofolio (Portfolios)
    Route::post('/portfolios/{id}/restore', [Admin\PortfolioController::class, 'restore'])->name('portfolios.restore');
    Route::resource('/portfolios', Admin\PortfolioController::class)->except(['show']);
});

// LOGIN ADMIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');