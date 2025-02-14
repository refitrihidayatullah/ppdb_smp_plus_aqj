<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
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
    Route::get('/dashboard_admin', [DashboardController::class,  'index'])->name('dashboard');



    Route::get('form_siswa', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::get('/ceksis', function () {
        // return view('welcome');
        echo "iya ini siswa";
    });
});

Route::middleware(['check.admin'])->group(function () {
    // routes ke dashboard
    Route::get('/dashboard_admin', [DashboardController::class,  'index'])->name('dashboard');
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
    Route::get('/data_siswa/{id}/edit', [SiswaController::class, 'edit'])->name('sisw.edit');
    Route::put('/data_siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/data_siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    // Get Json Data Siswa
    Route::get('/get_siswa', [SiswaController::class, 'get_siswa'])->name('get_siswa');




    // Route::get('/user', [DashboardController::class,  'index'])->name('dashboard');

    // CRUD data akun siswa

    // lihat data siswa



    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
