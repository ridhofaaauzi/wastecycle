<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminKelolaArtikelController;
use App\Http\Controllers\Admin\AdminKelolaPoinController;
use App\Http\Controllers\Admin\AdminKelolaSampahController;
use App\Http\Controllers\Admin\AdminKelolaUserController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\penukaranPoinController;
use App\Http\Controllers\PenukaranSampahController;
use App\Http\Controllers\RedemptionController;
use App\Http\Controllers\TransactionWasteController;
use App\Http\Controllers\UserController;
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

// authentication
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('user.index');
Route::get('/kontak', [HomeController::class, 'contact'])->name('user.kontak');

// users
Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');
Route::put('/profile/update/{id}', [UserController::class, 'update'])->name('user.profile.update');

// blogs
Route::get('/blog', [BlogController::class, 'index'])->name('user.blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('user.detailBlog')->middleware('authenticate');

// penukaran sampah
Route::get('/penukaranSampah', [PenukaranSampahController::class, 'index'])->name('user.penukaranSampah');
Route::get('/penukaranSampah/create/{id}', [PenukaranSampahController::class, 'create'])->name('user.penukaranSampah.create')->middleware('authenticate');
Route::post('/penukaranSampah/store/{id}', [PenukaranSampahController::class, 'store'])->name('user.penukaranSampah.store')->middleware('authenticate');


// penukaran poin
Route::get('/penukaranPoin', [penukaranPoinController::class, 'index'])->name('user.penukaranPoin');
Route::post('/penukaranPoin/store/{id}', [RedemptionController::class, 'store'])->name('user.penukaranPoin.store');

// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware(['authenticate', 'role:administrator']);

// admin user
Route::get('/admin/kelolaUser', [AdminKelolaUserController::class, 'index'])->name('admin.kelolaUser')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaUser/show/{id}', [AdminKelolaUserController::class, 'show'])->name('admin.kelolaUser.show')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaUser/edit/{id}', [AdminKelolaUserController::class, 'edit'])->name('admin.kelolaUser.edit')->middleware(['authenticate', 'role:administrator']);
Route::put('/admin/kelolaUser/update/{id}', [AdminKelolaUserController::class, 'update'])->name('admin.kelolaUser.update')->middleware(['authenticate', 'role:administrator']);
Route::delete('/admin/kelolaUser/delete/{id}', [AdminKelolaUserController::class, 'destroy'])->name('admin.kelolaUser.delete')->middleware(['authenticate', 'role:administrator']);

// admin kelola artikel
Route::get('/admin/kelolaArtikel', [AdminKelolaArtikelController::class, 'index'])->name('admin.kelolaArtikel')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaArtikel/create', [AdminKelolaArtikelController::class, 'create'])->name('admin.kelolaArtikel.create')->middleware(['authenticate', 'role:administrator']);
Route::post('/admin/kelolaArtikel/store', [AdminKelolaArtikelController::class, 'store'])->name('admin.kelolaArtikel.store')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaArtikel/edit/{id}', [AdminKelolaArtikelController::class, 'edit'])->name('admin.kelolaArtikel.edit')->middleware(['authenticate', 'role:administrator']);
Route::put('/admin/kelolaArtikel/update/{id}', [AdminKelolaArtikelController::class, 'update'])->name('admin.kelolaArtikel.update')->middleware(['authenticate', 'role:administrator']);
Route::delete('/admin/kelolaArtikel/delete/{id}', [AdminKelolaArtikelController::class, 'destroy'])->name('admin.kelolaArtikel.destroy')->middleware(['authenticate', 'role:administrator']);

// admin kelola sampah
Route::get('/admin/kelolaSampah', [AdminKelolaSampahController::class, 'index'])->name('admin.kelolaSampah')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaSampah/create', [AdminKelolaSampahController::class, 'create'])->name('admin.kelolaSampah.create')->middleware(['authenticate', 'role:administrator']);
Route::post('/admin/kelolaSampah/store', [AdminKelolaSampahController::class, 'store'])->name('admin.kelolaSampah.store')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaSampah/edit/{id}', [AdminKelolaSampahController::class, 'edit'])->name('admin.kelolaSampah.edit')->middleware(['authenticate', 'role:administrator']);
Route::put('/admin/kelolaSampah/update/{id}', [AdminKelolaSampahController::class, 'update'])->name('admin.kelolaSampah.update')->middleware(['authenticate', 'role:administrator']);
Route::delete('/admin/kelolaSampah/delete/{id}', [AdminKelolaSampahController::class, 'destroy'])->name('admin.kelolaSampah.destroy')->middleware(['authenticate', 'role:administrator']);

// admin kelola poin
Route::get('/admin/kelolaPoin', [AdminKelolaPoinController::class, 'index'])->name('admin.kelolaPoin')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaPoin/create', [AdminKelolaPoinController::class, 'create'])->name('admin.kelolaPoin.create')->middleware(['authenticate', 'role:administrator']);
Route::post('/admin/kelolaPoin/store', [AdminKelolaPoinController::class, 'store'])->name('admin.kelolaPoin.store')->middleware(['authenticate', 'role:administrator']);
Route::get('/admin/kelolaPoin/edit/{id}', [AdminKelolaPoinController::class, 'edit'])->name('admin.kelolaPoin.edit')->middleware(['authenticate', 'role:administrator']);
Route::put('/admin/kelolaPoin/update/{id}', [AdminKelolaPoinController::class, 'update'])->name('admin.kelolaPoin.update')->middleware(['authenticate', 'role:administrator']);
Route::delete('/admin/kelolaPoin/delete/{id}', [AdminKelolaPoinController::class, 'destroy'])->name('admin.kelolaPoin.destroy')->middleware(['authenticate', 'role:administrator']);


// admin penukaran sampah
Route::get('/admin/penukaranSampah', [TransactionWasteController::class, 'index'])->name('admin.penukaranSampah')->middleware(['authenticate', 'role:administrator']);

// admin penukaran Poin
Route::get('/admin/penukaranPoin', [RedemptionController::class, 'index'])->name('admin.penukaranPoin')->middleware(['authenticate', 'role:administrator']);

// userResource
Route::get('/user/userResource', [UserController::class, 'userResource'])->name('user.userResource');