<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\PmbController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Identical URLs & Frontend Behavior)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'beranda'])->name('home');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/prodi', [PageController::class, 'prodi'])->name('prodi');
Route::get('/keunikan', [PageController::class, 'keunikan'])->name('keunikan');
Route::get('/pmb', [PageController::class, 'pmb'])->name('pmb');
Route::get('/dokumentasi', [PageController::class, 'dokumentasi'])->name('dokumentasi');
Route::get('/daftar_dosen', [PageController::class, 'daftarDosen'])->name('daftar_dosen');
Route::get('/daftar_tendik', [PageController::class, 'daftarTendik'])->name('daftar_tendik');

// Berita routes
Route::get('/beranda/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/beranda/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Dynamic Sitemap for SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// SPMB redirect to static subsite if visited directly
Route::get('/spmb', function () {
    return redirect('/spmb/');
});

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita Management
    Route::resource('berita', AdminBeritaController::class)->parameters(['berita' => 'berita'])->except(['show']);
    Route::post('berita/{berita}/toggle', [AdminBeritaController::class, 'togglePublish'])->name('berita.toggle');

    // Kategori Berita Management
    Route::resource('kategori', \App\Http\Controllers\Admin\CategoryController::class)->except(['create', 'show', 'edit']);

    // Slider Management
    Route::resource('sliders', SliderController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::post('sliders/{slider}/toggle', [SliderController::class, 'toggle'])->name('sliders.toggle');

    // Konten Website Management
    Route::get('konten', [ContentController::class, 'index'])->name('konten.index');
    Route::post('konten/sambutan', [ContentController::class, 'updateSambutan'])->name('konten.sambutan');
    Route::post('konten/pmb', [ContentController::class, 'updatePmb'])->name('konten.pmb');
    Route::post('konten/profil', [ContentController::class, 'updateProfil'])->name('konten.profil');
    Route::post('konten/general', [ContentController::class, 'updateGeneral'])->name('konten.general');

    // Kelola Informasi PMB Lengkap
    Route::get('pmb', [PmbController::class, 'index'])->name('pmb.index');
    Route::post('pmb/hero', [PmbController::class, 'updateHero'])->name('pmb.hero');
    Route::post('pmb/jadwal', [PmbController::class, 'updateJadwal'])->name('pmb.jadwal');
    Route::post('pmb/biaya', [PmbController::class, 'updateBiaya'])->name('pmb.biaya');
    Route::post('pmb/persyaratan', [PmbController::class, 'updatePersyaratan'])->name('pmb.persyaratan');
    Route::post('pmb/info', [PmbController::class, 'updateInfo'])->name('pmb.info');
    Route::post('pmb/reset', [PmbController::class, 'resetDefaults'])->name('pmb.reset');

    // Civitas Akademika
    Route::resource('dosen', LecturerController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('tendik', StaffController::class)->only(['index', 'store', 'update', 'destroy']);
});
