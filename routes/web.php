<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\PetaniAuthController;
use App\Http\Controllers\Auth\PembeliAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\VerifikasiPetaniController;
use App\Http\Controllers\Admin\VerifikasiLahanController;
use App\Exports\UsersExport;
use App\Exports\LahanExport;
use App\Exports\ProdukExport;

use App\Http\Controllers\Petani\PetaniDashboardController;
use App\Http\Controllers\Petani\ProdukController as PetaniProdukController;
use App\Http\Controllers\Petani\LahanController as PetaniLahanController;
use App\Http\Controllers\Petani\PengajuanMinatController as PetaniPengajuanMinatController;
use App\Http\Controllers\Petani\PesananController as PetaniPesananController;

use App\Http\Controllers\Pembeli\PembeliDashboardController;
use App\Http\Controllers\Pembeli\PengajuanMinatController;
use App\Http\Controllers\Pembeli\LahanController as PembeliLahanController;
use App\Http\Controllers\Pembeli\KeranjangController;
use App\Http\Controllers\Pembeli\ProdukController as PembeliProdukController;
use App\Http\Controllers\Pembeli\PesananController as PembeliPesananController;

Route::get('/chat/{roomId}', [ChatController::class, 'show']);
Route::post('/chat/send', [ChatController::class, 'send']);
/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'));

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/
Route::get('/register/petani', [RegisterController::class, 'showPetani']);
Route::post('/register/petani', [RegisterController::class, 'storePetani']);

Route::get('/register/pembeli', [RegisterController::class, 'showPembeli']);
Route::post('/register/pembeli', [RegisterController::class, 'storePembeli']);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login/admin', [AdminAuthController::class, 'showLogin']);
Route::post('/login/admin', [AdminAuthController::class, 'login']);

Route::get('/login/petani', [PetaniAuthController::class, 'showLogin']);
Route::post('/login/petani', [PetaniAuthController::class, 'login']);

Route::get('/login/pembeli', [PembeliAuthController::class, 'showLogin']);
Route::post('/login/pembeli', [PembeliAuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    session()->forget('user');
    session()->flush();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| PEMBELI (FOCUS MARKETPLACE LAHAN + MINAT)
|--------------------------------------------------------------------------
*/
Route::prefix('pembeli')->middleware('pembeli.auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [PembeliDashboardController::class, 'index']);

    // MARKETPLACE LAHAN
    Route::get('/lahan', [PembeliLahanController::class, 'index']);

    // KIRIM MINAT LAHAN
    Route::post('/lahan/{id}/minat', [PengajuanMinatController::class, 'store']);

    // STATUS MINAT PEMBELI
    Route::get('/minat', [PengajuanMinatController::class, 'indexPembeli']);
    Route::get('/pembeli/chat', [PengajuanMinatController::class, 'chatList']);
    // MARKETPLACE PRODUK
    Route::post('/keranjang/tambah/{produkId}', [KeranjangController::class, 'store']);
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy']);
    Route::post('/keranjang/{id}/tambah', [KeranjangController::class, 'tambah']);
    Route::post('/keranjang/{id}/kurang', [KeranjangController::class, 'kurang']);
    Route::post('/checkout', [KeranjangController::class, 'checkout']);
    Route::get('/produk', [PembeliProdukController::class, 'index']);
    Route::get('/pesanan', [PembeliPesananController::class, 'index']);
    Route::get('/pesanan/{id}', [PembeliPesananController::class, 'show']);

     Route::get(
    '/pesanan/{id}/nota',
    [PembeliPesananController::class, 'downloadNota']
    )->name('pembeli.pesanan.nota');
});

/*
|--------------------------------------------------------------------------
| PETANI
|--------------------------------------------------------------------------
*/
Route::prefix('petani')->middleware('petani.auth')->group(function () {

    Route::get('/dashboard', [PetaniDashboardController::class, 'index']);

    // PRODUK
    Route::get('/produk', [PetaniProdukController::class, 'index']);
    Route::get('/produk/create', [PetaniProdukController::class, 'create']);
    Route::post('/produk', [PetaniProdukController::class, 'store']);
    Route::get('/produk/{id}/edit', [PetaniProdukController::class, 'edit']);
    Route::put('/produk/{id}', [PetaniProdukController::class, 'update']);
    Route::delete('/produk/{id}', [PetaniProdukController::class, 'destroy']);


    // LAHAN
    Route::get('/lahan', [PetaniLahanController::class, 'index']);
    Route::get('/lahan/create', [PetaniLahanController::class, 'create']);
    Route::post('/lahan', [PetaniLahanController::class, 'store']);
    Route::get('/lahan/{id}/edit', [PetaniLahanController::class, 'edit']);
    Route::put('/lahan/{id}', [PetaniLahanController::class, 'update']);
    Route::delete('/lahan/{id}', [PetaniLahanController::class, 'destroy']);

    // MINAT DARI PEMBELI
    Route::get('/minat', [PetaniPengajuanMinatController::class, 'index']);
    Route::post('/minat/{id}/accept', [PetaniPengajuanMinatController::class, 'accept']);
    Route::post('/minat/{id}/reject', [PetaniPengajuanMinatController::class, 'reject']);
    Route::get('/pesanan', [PetaniPesananController::class, 'index']);
    Route::post('/pesanan/{id}/status', [PetaniPesananController::class, 'updateStatus']);
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('admin.auth')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    // VERIFIKASI PETANI
    Route::get('/petani', [VerifikasiPetaniController::class, 'index']);
    Route::get('/petani/{id}/approve', [VerifikasiPetaniController::class, 'approve']);
    Route::get('/petani/{id}/reject', [VerifikasiPetaniController::class, 'reject']);

    // VERIFIKASI LAHAN
    Route::get('/lahan', [VerifikasiLahanController::class, 'index']);
    Route::get('/lahan/{id}/approve', [VerifikasiLahanController::class, 'approve']);
    Route::get('/lahan/{id}/reject', [VerifikasiLahanController::class, 'reject']);

    // =========================
    // EXPORT (FIXED)
    // =========================
    Route::get('/export/users', [AdminDashboardController::class, 'exportUsers']);
    Route::get('/export/produk', [AdminDashboardController::class, 'exportProduk']);
    Route::get('/export/lahan', [AdminDashboardController::class, 'exportLahan']);
});