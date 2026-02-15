<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\LogAkunController;

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

Route::get('/healthz', function () {
    return response()->json(['status' => 'ok'], 200);
});

Route::get('/', [LandingController::class, 'index'])->name('home');

// Menampilkan form login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Proses login manual (email dan password)
Route::post('/login', [UserController::class, 'login']);

// Proses logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Menampilkan form register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');

// Proses register manual
Route::post('/register', [UserController::class, 'insertRegis'])->name('register');

// Login dengan sosial media
// Route::get('/login/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('social.login');
// Route::get('/login/{provider}/callback', [SocialiteController::class, 'handleProvideCallback'])->name('social.callback');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //akun
    Route::get('/profile', [LogAkunController::class, 'dataprofil'])->name("profile");
    Route::post('/edit-profile', [LogAkunController::class, 'editprofil']);
    Route::post('/edit-pw', [LogAkunController::class, 'editakun']);

    //user/pengguna
    Route::get('/data-user', [UserController::class, 'datauser'])->name('data-user');
    Route::post('/save-user', [UserController::class, 'simpanuser']);
    Route::get('/edit-user/{user_id}', [UserController::class, 'edituser'])->name('edit-user');
    Route::post('/update-user/{user_id}', [UserController::class, 'updateuser'])->name('update-user');
    Route::get('/delete-user/{user_id}', [UserController::class, 'hapususer'])->name('delete-user');

    //sekolah
    Route::get('/data-sekolah', [SekolahController::class, 'datasekolah'])->name('data-sekolah');
    Route::post('/save-school', [SekolahController::class, 'simpansekolah']);
    Route::post('/update-school/{NPSN}', [SekolahController::class, 'updatesekolah']);
    Route::get('/delete-school/{NPSN}', [SekolahController::class, 'hapussekolah']);

    //prodi
    Route::get('/data-prodi', [ProgramStudiController::class, 'dataprodi'])->name('data-prodi');
    Route::post('/save-prodi', [ProgramStudiController::class, 'simpanprodi']);
    Route::post('/update-prodi/{id_prodi}', [ProgramStudiController::class, 'updateprodi']);
    Route::get('/delete-prodi/{id_prodi}', [ProgramStudiController::class, 'hapusprodi']);
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/{slug}', [ProdiController::class, 'show'])->name('prodi.show');

    //jadwal
    Route::get('/data-jadwal', [JadwalKegiatanController::class, 'datajadwal'])->name('data-jadwal');
    Route::post('/save-jadwal', [JadwalKegiatanController::class, 'simpanjadwal']);
    Route::post('/update-jadwal/{id}', [JadwalKegiatanController::class, 'updatejadwal']);
    Route::get('/delete-jadwal/{id}', [JadwalKegiatanController::class, 'hapusjadwal']);

    //pendaftaran
    Route::get('/data-registration', [PendaftaranController::class, 'datapendaftaran'])->name('data-registration');
    Route::get('/form-registration', [PendaftaranController::class, 'inputpendaftaran']);
    Route::post('/save-registration', [PendaftaranController::class, 'simpanpendaftaran']);
    Route::get('/edit-registration/{id_pendaftaran}', [PendaftaranController::class, 'editpendaftaran']);
    Route::post('/update-registration/{id_pendaftaran}', [PendaftaranController::class, 'updatependaftaran']);
    Route::get('/delete-registration/{id_pendaftaran}', [PendaftaranController::class, 'hapuspendaftaran']);
    Route::get('/detail-registration/{id_pendaftaran}', [PendaftaranController::class, 'detailpendaftaran']);
    Route::get('/card-registration/{id_pendaftaran}', [PendaftaranController::class, 'kartupendaftaran']);

    Route::get('/verified-registration/{id_pendaftaran}', [PendaftaranController::class, 'verifikasistatuspendaftaran']);
    Route::get('/notverified-registration/{id_pendaftaran}', [PendaftaranController::class, 'notverifikasistatuspendaftaran']);
    Route::get('/invalid-registration/{id_pendaftaran}', [PendaftaranController::class, 'invalidstatuspendaftaran']);
    Route::get('/finish-registration/{id_pendaftaran}', [PendaftaranController::class, 'selesaistatuspendaftaran']);

    //pembayaran
    Route::get('/data-payment', [PembayaranController::class, 'datapembayaran'])->name('data-pembayaran');
    Route::post('/save-payment', [PembayaranController::class, 'simpanpembayaran']);
    Route::post('/update-payment/{id_pembayaran}', [PembayaranController::class, 'updatepembayaran']);
    Route::get('/delete-payment/{id_pembayaran}', [PembayaranController::class, 'hapuspembayaran']);

    Route::post('/upload-payment', [PembayaranController::class, 'updatebuktipembayaran'])->name('upload-payment');
    Route::get('/paid-payment/{id_pembayaran}', [PembayaranController::class, 'verifikasipembayaran']);
    Route::get('/unpaid-payment/{id_pembayaran}', [PembayaranController::class, 'belumbayar']);
    Route::get('/invalid-payment/{id_pembayaran}', [PembayaranController::class, 'invalidbayar']);

    //pengumuman
    Route::get('/data-announcement', [PengumumanController::class, 'datapengumuman'])->name('data-pengumuman');
    Route::get('/view-announcement/{id_pendaftaran}', [PengumumanController::class, 'lihatpengumuman']);
    Route::get('/view-announcement', [PengumumanController::class, 'lihatpengumuman']);
    Route::post('/save-announcement', [PengumumanController::class, 'simpanpengumuman']);
    Route::post('/update-announcement/{id_pengumuman}', [PengumumanController::class, 'updatepengumuman']);
    Route::get('/delete-announcement/{id_pengumuman}', [PengumumanController::class, 'hapuspengumuman']);
});
