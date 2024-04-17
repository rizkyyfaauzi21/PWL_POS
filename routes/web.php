<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Monolog\Level;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);

// Route::get('/user', [UserController::class, 'index'])->name('/user');
// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

Route::get('/kategori', [KategoriController::class, 'index']);

// Tugas nomer 1 js 5
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store']);

// Tugas nomer 3 js 5
Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::put('/kategori/edit_simpan/{id}', [KategoriController::class, 'edit_simpan'])->name('/kategori/edit_simpan');

// Tugas nomer 4 js 5
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('/kategori/hapus');

Route::get('/user', [UserController::class, 'index'])->name('/user');
Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('/user/edit');
Route::post('/user', [UserController::class, 'store']);

Route::get('/level', [LevelController::class, 'index'])->name('/level');
Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');
Route::post('/level', [LevelController::class, 'store']);

Route::resource('m_user', POSController::class);

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [UserController::class, 'destroy']);

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [LevelController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [LevelController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [LevelController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [LevelController::class, 'destroy']);

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [KategoriController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [KategoriController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [KategoriController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [KategoriController::class, 'destroy']);

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [BarangController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [BarangController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [BarangController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [BarangController::class, 'destroy']);

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [StokController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [StokController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [StokController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [StokController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [StokController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [StokController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [StokController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [StokController::class, 'destroy']);

Route::group(['prefix' => 'transaksi'], function () {
    Route::get('/', [TransaksiController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [TransaksiController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [TransaksiController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [TransaksiController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [TransaksiController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [TransaksiController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [TransaksiController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [TransaksiController::class, 'destroy']); // menghapus data user
});

// Route::delete('/{id}', [TransaksiController::class, 'destroy']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('manager', ManagerController::class);
    });
});