<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SanksiController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\GuruController;
// use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BenpelController;
use App\Http\Controllers\HistorypelanggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormbimbinganController;
use App\Http\Controllers\AkunsiswaController;
use App\Http\Controllers\AkunguruController;
use App\Http\Controllers\InputpelanggaranController;




/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/admin', function () {
//     return view('dashboard-admin');
// });

// Route::get('/guru', function () {
//     return view('dashboard-guru');
// });

// Route::get('/siswa', function () {
//     return view('dashboard-siswa');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

//dashboard
Route::get('/dashboard',[DashboardController::class, 'index'])->name ('dashboard');

// Login
 Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
 Route::get('/login',[LoginController::class, 'halamanlogin'])->name('login');
 Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
 Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


// //Dashboard admin
// Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');

// //Dashboard guru
// Route::get('/dashboard-guru', [GuruController::class, 'index'])->name('dashboard-guru');

// ///Dashboard siswa
// Route::get('/dashboard-siswa', [SiswaController::class, 'index'])->name('dashboard-siswa');


// //login admin
//  Route::get('/dashboard-admin',[AdminController::class, 'index'])->name('dashboard-admin');
//  Route::get('/login',[LoginController::class, 'halamanlogin'])->name('login');
//  Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
//  Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//  //login guru
//  Route::get('/dashboard-guru',[GuruController::class, 'index'])->name('dashboard-guru');
//  Route::get('/login',[LoginController::class, 'halamanlogin'])->name('login');
//  Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
//  Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//  //login siswa
//  Route::get('/dashboard-siswa',[SiswaController::class, 'index'])->name('dashboard-siswa');
//  Route::get('/login',[LoginController::class, 'halamanlogin'])->name('login');
//  Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
//  Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['CekLevel:admin']], function () {
//         Route::resource('admin', AdminController::class);
//     });
//     Route::group(['middleware' => ['CekLevel:guru']], function () {
//         Route::resource('guru', GuruController::class);
//     });
//     Route::group(['middleware' => ['CekLevel:siswa']], function () {
//         Route::resource('siswa', SiswaController::class);
//     });

Route::group(['middleware' => ['auth','ceklevel:admin,guru,siswa']], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});


//datasiswa
Route::get('/datasiswa',[DatasiswaController::class, 'index'])->name('datasiswa');
Route::get('/create-datasiswa',[DatasiswaController::class, 'create'])->name('create-datasiswa');
Route::post('/simpan-datasiswa',[DatasiswaController::class, 'store'])->name('simpan-datasiswa');
Route::get('/edit-datasiswa/{id}',[DatasiswaController::class, 'edit'])->name('edit-datasiswa');
Route::post('/update-datasiswa/{id}',[DatasiswaController::class, 'update'])->name('update-datasiswa');
Route::get('/delete-datasiswa/{id}',[DatasiswaController::class, 'destroy'])->name('delete-datasiswa');

//kelas
Route::get('/kelas',[KelasController::class, 'index'])->name('kelas');
Route::get('/create-kelas',[KelasController::class, 'create'])->name('create-kelas');
Route::post('/simpan-kelas',[KelasController::class, 'store'])->name('simpan-kelas');
Route::get('/edit-kelas/{id}',[KelasController::class, 'edit'])->name('edit-kelas');
Route::post('/update-kelas/{id}',[KelasController::class, 'update'])->name('update-kelas');
Route::get('/delete-kelas/{id}',[KelasController::class, 'destroy'])->name('delete-kelas');

//sanksi
Route::get('/sanksi',[SanksiController::class, 'index'])->name('sanksi');
Route::get('/create-sanksi',[SanksiController::class, 'create'])->name('create-sanksi');
Route::post('/simpan-sanksi',[SanksiController::class, 'store'])->name('simpan-sanksi');
Route::get('/edit-sanksi/{id}',[SanksiController::class, 'edit'])->name('edit-sanksi');
Route::post('/update-sanksi/{id}',[SanksiController::class, 'update'])->name('update-sanksi');
Route::get('/delete-sanksi/{id}',[SanksiController::class, 'destroy'])->name('delete-sanksi');


//Kategori
Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori');
Route::get('/create-kategori',[KategoriController::class, 'create'])->name('create-kategori');
Route::post('/simpan-kategori',[KategoriController::class, 'store'])->name('simpan-kategori');
Route::get('/edit-kategori/{id}',[KategoriController::class, 'edit'])->name('edit-kategori');
Route::post('/update-kategori/{id}',[KategoriController::class, 'update'])->name('update-kategori');
Route::get('/delete-kategori/{id}',[KategoriController::class, 'destroy'])->name('delete-kategori');

//Bentuk Pelanggaran
Route::get('/benpel',[BenpelController::class, 'index'])->name('benpel');
Route::get('/create-benpel',[BenpelController::class, 'create'])->name('create-benpel');
Route::post('/simpan-benpel',[BenpelController::class, 'store'])->name('simpan-benpel');
Route::get('/edit-benpel/{id}',[BenpelController::class, 'edit'])->name('edit-benpel');
Route::post('/update-benpel/{id}',[BenpelController::class, 'update'])->name('update-benpel');
Route::get('/delete-benpel/{id}',[BenpelController::class, 'destroy'])->name('delete-benpel');

//historypelanggaran
Route::get('/historypelanggaran',[HistorypelanggaranController::class, 'index'])->name('historypelanggaran');

//formbimbingan
Route::get('/formbimbingan',[FormbimbinganController::class, 'index'])->name('formbimbingan');
Route::post('/simpan-formbimbingan',[FormbimbinganController::class, 'store'])->name('simpan-\formbimbingan');

//Akunsiswa
Route::get('/akunsiswa',[AkunsiswaController::class, 'index'])->name('akunsiswa');
Route::get('/create-akunsiswa',[AkunsiswaController::class, 'create'])->name('create-akunsiswa');
Route::post('/simpan-akunsiswa',[AkunsiswaController::class, 'store'])->name('simpan-akunsiswa');
Route::get('/edit-akunsiswa/{id}',[AkunsiswaController::class, 'edit'])->name('edit-akunsiswa');
Route::post('/update-akunsiswa/{id}',[AkunsiswaController::class, 'update'])->name('update-akunsiswa');
Route::get('/delete-akunsiswa/{id}',[AkunsiswaController::class, 'destroy'])->name('delete-akunsiswa');

//akunguru
Route::get('/akunguru',[AkunguruController::class, 'index'])->name('akunguru');
Route::get('/create-akunguru',[AkunguruController::class, 'create'])->name('create-akunguru');
Route::post('/simpan-akunguru',[AkunguruController::class, 'store'])->name('simpan-akunguru');
Route::get('/edit-akunguru/{id}',[AkunguruController::class, 'edit'])->name('edit-akunguru');
Route::post('/update-akunguru/{id}',[AkunguruController::class, 'update'])->name('update-akunguru');
Route::get('/delete-akunguru/{id}',[AkunguruController::class, 'destroy'])->name('delete-akunguru');

//inputpelanggaran
Route::get('/inputpelanggaran',[InputpelanggaranController::class, 'index'])->name('inputpelanggaran');
Route::get('/create-pelanggaran',[InputpelanggaranController::class, 'create'])->name('create-pelanggaran');
Route::post('/simpan-pelanggaran',[InputpelanggaranController::class, 'store'])->name('simpan-pelanggaran');
