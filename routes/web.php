<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BenpelController;
use App\Http\Controllers\HistorypelanggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunsiswaController;
use App\Http\Controllers\AkunguruController;
use App\Http\Controllers\SanksiguruController;
use App\Http\Controllers\DaftarsiswaController;
use App\Http\Controllers\SanksisiswaController;
use App\Http\Controllers\InputpelanggaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BimbingansiswaController;
use App\Http\Controllers\BimbinganadminController;
use App\Http\Controllers\HistorypelanggaransiswaController;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => ["guest"]], function() {
    Route::get("/", [LoginController::class, "halamanlogin"]);
    Route::get('/login',[LoginController::class, 'halamanlogin'])->name('login');
    Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
});

Route::group(["middleware" => ["autentikasi"]], function() {

    //dashboard
    Route::get('/dashboard',[DashboardController::class, 'index'])->name ('dashboard');

    // Login
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


    Route::group(['middleware' => ['auth','ceklevel:admin,guru,siswa']], function () {
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    });


    //datasiswa
    Route::get('/datasiswa',[DatasiswaController::class, 'index'])->name('datasiswa');
    Route::get('/create-datasiswa',[DatasiswaController::class, 'create'])->name('create-datasiswa');
    Route::post('/simpan-datasiswa',[DatasiswaController::class, 'store'])->name('simpan-datasiswa');
    Route::get('/edit-datasiswa/{id}',[DatasiswaController::class, 'edit'])->name('edit-datasiswa');
    Route::post('/update-datasiswa/{id}',[DatasiswaController::class, 'update'])->name('update-datasiswa');
    Route::get("/delete-datasiswa/{user_id}", [DatasiswaController::class, "destroy"]);
    // Route::get('/delete-datasiswa/{user_id}',[DatasiswaController::class, 'destroy'])->name('delete-datasiswa');

    Route::get("/historypelanggaransiswa", [HistorypelanggaransiswaController::class, "index"]);

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
    Route::get('/historypelanggaran',[HistorypelanggaranController::class, 'index']);
    // Route::get('/historypelanggaran',[HistorypelanggaranController::class, 'store'])->name('historypelanggaran');
    Route::get('/delete-historypelanggaran/{id}',[HistorypelanggaranController::class, 'destroy'])->name('delete-historypelanggaran');


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

    //sanksiguru
    Route::get('/lihat-sanksi',[SanksiguruController::class, 'index'])->name('lihat-sanksi');

    //Daftarsiswa
    Route::get('/daftarsiswa',[DaftarsiswaController::class, 'index'])->name('daftarsiswa');

    //sanksisiswa
    Route::get('/sanksi-siswa',[SanksiguruController::class, 'index'])->name('sanksi-siswa');

    //inputpelanggaran
    Route::get('/inputpelanggaran',[InputpelanggaranController::class, 'index'])->name('inputpelanggaran');
    Route::get('/create-pelanggaran/{id}',[InputpelanggaranController::class, 'create'])->name('create-pelanggaran');
    Route::post('/simpan-pelanggaran',[InputpelanggaranController::class, 'store'])->name('simpan-pelanggaran');

    //profile
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
    Route::get('/setting',[ProfileController::class, 'setting'])->name('setting');
    //profile
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
    // Route::get('/setting',[ProfileController::class, 'setting'])->name('setting');
    // Route::patch('/profile/{id}',[ProfileController::class, 'update'])->name('profile.update');

    Route::get('/setting',[ProfileController::class, 'setting'])->name('setting');
    //bimbingansiswa
    Route::get('/bimbingansiswa',[BimbingansiswaController::class, 'index'])->name('bimbingansiswa');
    Route::post("/bimbingansiswa", [BimbingansiswaController::class, "store"]);

    Route::get('/bimbinganadmin',[BimbinganadminController::class, 'index'])->name('bimbinganadmin');
    Route::get('/tanggapibimbingan/{id}',[BimbinganadminController::class, 'edit'])->name('tanggapibimbingan');
    Route::post('/update-bimbinganadmin/{id}',[BimbinganadminController::class, 'update'])->name('update-bimbinganadmin');
    Route::get('/delete-bimbinganadmin/{id}',[BimbinganadminController::class, 'destroy'])->name('delete-bimbinganadmin');

    //bimbinganadmin
    Route::get('/bimbinganadmin',[BimbinganadminController::class, 'index'])->name('bimbinganadmin');
    Route::get('/tanggapibimbingan/{id}',[BimbinganadminController::class, 'edit'])->name('tanggapibimbingan');
    Route::post('/update-bimbinganadmin/{id}',[BimbinganadminController::class, 'update'])->name('update-bimbinganadmin');
    Route::get('/delete-bimbinganadmin/{id}',[BimbinganadminController::class, 'destroy'])->name('delete-bimbinganadmin');
});
