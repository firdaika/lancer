<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNotifikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\Langganancontroller;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\NotifikasiUserController;
use App\Http\Controllers\OpsiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserJadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PaketController;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;





//USER
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    // Pengaturan
    Route::get('/pengaturan', [AuthController::class, 'pengaturan'])->name('pengaturan');

    // Profile


Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

Route::post('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update');

    // Jadwal
    Route::get('/jadwal', [UserJadwalController::class, 'index'])->name('jadwal');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/pembayaran/store',[PembayaranController::class, 'store'])-> name('pembayaran.store');

    // Logout (disarankan POST, tapi GET juga aman)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Landing Page
    Route::get('/', [AuthController::class, 'landingpage'])->name('landingpage');

// Home umum (tanpa login)
Route::get('/home', [AuthController::class, 'home'])->name('home');

// Opsi jurusan
Route::get('/opsisains', [OpsiController::class, 'sains'])->name('opsisains');
Route::get('/opsisosial', [OpsiController::class, 'sosial'])->name('opsisosial');
Route::get('/opsiIt', [OpsiController::class, 'it'])->name('opsiIt');
Route::get('/opsiBahasa', [OpsiController::class, 'bahasa'])->name('opsiBahasa');

// Proses opsi
Route::get('/pilihMapel', [OpsiController::class, 'pilihMapel'])->name('pilihMapel');
Route::post('/pilihMapel', [OpsiController::class, 'pilihMapel'])->name('pilihMapel');

// Notifikasi
Route::get('/notifikasiUser', [NotifikasiUserController::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasiUser/baca/{id}', [NotifikasiUserController::class, 'baca'])->name('notifikasi.baca');



//=======ADMIN==========\\
Route::get('/dasboardAdmin', [AdminController::class, 'dasboardAdmin'])->name('dasboardAdmin');

    Route::get('/dataAdmin', [AdminController::class, 'index'])->name('admin');
    Route::post('/dataAdmin', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/admin/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.status');
    Route::delete('/dataAdmin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

// ADMIN - MAPEL
    Route::get('/mataPelajaran', [MapelController::class, 'index'])->name('mataPelajaran');
    Route::post('/mataPelajaran', [MapelController::class, 'store'])->name('mapel.store');
    Route::put('/mataPelajaran/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/mataPelajaran/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');

// ADMIN - MATERI
    Route::get('/dataMateri', [MateriController::class, 'index'])->name('dataMateri');
    Route::post('/dataMateri', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/dataMateri/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/dataMateri/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

// ADMIN - USER
    Route::get('/dataUser', [UserController::class, 'index'])->name('user.index');
    Route::post('/dataUser', [UserController::class, 'store'])->name('user.store');

    Route::put('/dataUser/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dataUser/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// ADMIN FORMULIR
Route::get('/dataFormulir', [FormulirController::class, 'index'])->name('formulir.index');

// ADMIN LANGGANAN
Route::get('/dataLangganan', [LanggananController::class, 'index'])->name('langganan.index');

// ADMIN PEMBAYARAN
Route::get('/dataPembayaran', [PembayaranController::class, 'dataPembayaran'])->name('pembayaran.dataPembayaran');
Route::post('/admin/dataPembayaran/{id}/status',[PembayaranController::class, 'updateStatus'])-> name('admin.dataPembayaran.updateStatus');

// ADMIN JADWAL
Route::get('/jadwalAdmin', [JadwalController::class,'index'])->name('jadwalAdmin');
Route::post('/jadwalAdmin/store', [JadwalController::class,'store'])->name('jadwal.store');
Route::post('/jadwalAdmin/update/{id}', [JadwalController::class,'update'])->name('jadwal.update');
Route::delete('/jadwalAdmin/destroy/{id}', [JadwalController::class,'destroy'])->name('jadwal.destroy');

//NOTIFIKASI
    Route::get('/notifikasi', [AdminNotifikasiController::class, 'index'])->name('admin.notifikasi.index');
    Route::post('/notifikasi', [AdminNotifikasiController::class, 'store'])->name('admin.notifikasi.store');
    Route::delete('/notifikasi/{id}', [AdminNotifikasiController::class, 'destroy'])->name('admin.notifikasi.destroy');

// DATA PAKET (Admin)
Route::get('/dataPaket', [PaketController::class, 'index'])->name('dataPaket');
Route::post('/dataPaket', [PaketController::class, 'store'])->name('store');
Route::put('/dataPaket/{id}', [PaketController::class, 'update'])->name('update');
Route::delete('/dataPaket/{id}', [PaketController::class, 'destroy'])->name('destroy');


// ADMIN GURU
Route::get('/dataGuru', [GuruController::class, 'index'])->name('admin.dataGuru');
Route::post('/dataGuru/store', [GuruController::class, 'store'])->name('guru.store');
Route::post('/dataGuru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::get('/dataGuru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

 Route::post('/admin/logout', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');
