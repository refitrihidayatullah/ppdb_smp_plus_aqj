<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaDaftarController;
use App\Http\Controllers\TestingAjah;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     echo "ini halaman utama website ppdbnya";
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'register_student'])->name('register.student');
Route::post('/check-email', [AuthController::class, 'checkEmail']);
Route::post('/register_process', [AuthController::class, 'register_student_process'])->name('register_process');



// testing template
// Route::get('/dashboard_admin', [DashboardController::class,  'index'])->name('dashboard');

Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['check.siswa'])->group(function () {
    Route::get('form_siswa', [SiswaDaftarController::class, 'index'])->name('dashboard_siswa');



    // JQUERY kirim data

    // query form identitas siswa
    Route::post('/siswa-update-form', [SiswaDaftarController::class, 'send_kelas_dom'])->name('siswa_form_update_identitas');
    Route::post('/siswa-update_id_siswa', [SiswaDaftarController::class, 'send_identitas_siswa'])->name('siswa_form_update_identitas_siswa');
    Route::post('/siswa-update_alamat_siswa', [SiswaDaftarController::class, 'send_alamat_siswa'])->name('siswa_form_update_alamat_siswa');
    Route::post('/siswa-update_pendidikan_siswa', [SiswaDaftarController::class, 'send_riwayat_pendidikan_siswa'])->name('siswa_form_update_pendidikan_siswa');
    Route::post('/siswa-update_ortu_siswa', [SiswaDaftarController::class, 'send_ortu_siswa'])->name('siswa_form_update_ortu_siswa');
    Route::post('/siswa-update_wali_siswa', [SiswaDaftarController::class, 'send_wali_siswa'])->name('siswa_form_update_wali_siswa');
    Route::post('/siswa-update_status', [SiswaDaftarController::class, 'send_status_daftar'])->name('siswa_update_status');
    // query form identitas siswa
    // upload foto
    Route::post('/siswa-update_foto_siswa', [SiswaDaftarController::class, 'upload_foto'])->name('siswa_upload_foto_siswa');
    Route::post('/siswa-update_kk_siswa', [SiswaDaftarController::class, 'upload_kk'])->name('siswa_upload_kk');
    Route::post('/siswa-update_ijazah', [SiswaDaftarController::class, 'upload_ijazah'])->name('siswa_upload_ijazah');
    Route::post('/siswa-update_ktp_ortu', [SiswaDaftarController::class, 'upload_ktp'])->name('siswa_upload_ktp');
    // Route::post('/change-password', [SiswaDaftarController::class, 'changePassword'])->name('ubah_password');
    // JQUERY kirim data
// ekspor PDF
    Route::get('/siswa-generate-pdf', [SiswaDaftarController::class, 'generate_pdf'])->name('generate_pdf');

    // ekspor PDF

    // Route::get('form_siswa', function () {
    //     return view('siswa.dashboard');
    // })->name('siswa.dashboard');

    Route::get('/ceksis', function () {
        // return view('welcome');
        echo "iya ini siswa";
    });
});

Route::middleware(['check.admin'])->group(function () {
    // routes ke dashboard
    Route::get('/dashboard_admin', [DashboardController::class, 'index'])->name('dashboard');
    // CRUD admin
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/tambah_user', [UserController::class, 'create'])->name('tambah_user');
    Route::post('users/tambah_user_proses', [UserController::class, 'store'])->name('store_user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // get_json admin
    Route::get('/get_user', [UserController::class, 'get_user'])->name('get_user');

    // Route CRUD Data Siswa
    Route::get('/data_siswa', [SiswaController::class, 'index'])->name('data_siswa');
    Route::get('/data_siswa/tambah_siswa', [SiswaController::class, 'create'])->name('tambah_siswa');
    Route::post('data_siswa/tambah_siswa_proses', [SiswaController::class, 'store'])->name('store_siswa');
    Route::get('/data_siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/data_siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/data_siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    // Get Json list Data Siswa
    Route::get('/get_siswa', [SiswaController::class, 'get_siswa'])->name('get_siswa');


    Route::get('/test_edit_siswa', [SiswaController::class, 'test_edit'])->name('test_edit_siswa');

    // query form identitas siswa
    Route::post('/update-form', [SiswaController::class, 'send_kelas_dom'])->name('form_update_identitas');
    Route::post('/update_id_siswa', [SiswaController::class, 'send_identitas_siswa'])->name('form_update_identitas_siswa');
    Route::post('/update_alamat_siswa', [SiswaController::class, 'send_alamat_siswa'])->name('form_update_alamat_siswa');
    Route::post('/update_pendidikan_siswa', [SiswaController::class, 'send_riwayat_pendidikan_siswa'])->name('form_update_pendidikan_siswa');
    Route::post('/update_ortu_siswa', [SiswaController::class, 'send_ortu_siswa'])->name('form_update_ortu_siswa');
    Route::post('/update_wali_siswa', [SiswaController::class, 'send_wali_siswa'])->name('form_update_wali_siswa');
    Route::post('/update_status', [SiswaController::class, 'send_status_daftar'])->name('update_status');
    // query form identitas siswa
    // upload foto
    Route::post('/update_foto_siswa', [SiswaController::class, 'upload_foto'])->name('upload_foto_siswa');
    Route::post('/update_kk_siswa', [SiswaController::class, 'upload_kk'])->name('upload_kk');
    Route::post('/update_ijazah', [SiswaController::class, 'upload_ijazah'])->name('upload_ijazah');
    Route::post('/update_ktp_ortu', [SiswaController::class, 'upload_ktp'])->name('upload_ktp');
    Route::post('/change-password', [SiswaController::class, 'changePassword'])->name('ubah_password');

    // Route::get('/user', [DashboardController::class,  'index'])->name('dashboard');

    // CRUD data akun siswa

    // lihat data siswa


    // PDF
    Route::get('/data_siswa/{id}/siswa-generate-pdf', [SiswaController::class, 'generate_pdf_siswa'])->name('generate_pdf_siswa_admin');
    // PDF



    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// ROUTES UNTUK LARAVOLT WILAYAH INDONESIA

Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-cities', [LocationController::class, 'getCities']);
Route::get('/get-districts', [LocationController::class, 'getDistricts']);
Route::get('/get-villages', [LocationController::class, 'getVillages']);

// ROUTES UNTUK LARAVOLT WILAYAH INDONESIA
// ROUTES untuk mencari sekolah by NPSN

// Route untuk menampilkan form pencarian
Route::get('/cari-sekolah', [SekolahController::class, 'index'])->name('cari.sekolah.form');

// Route untuk menangani form submission
Route::get('/cari-sekolah/action', [SekolahController::class, 'cariSekolah'])->name('cari.sekolah');

// ROUTES untuk mencari sekolah by NPSN
// testing blade
