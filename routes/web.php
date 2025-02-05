<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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



Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['check.siswa'])->group(function () {
    Route::get('form_siswa', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::get('/ceksis', function () {
        // return view('welcome');
        echo "iya ini siswa";
    });
});

Route::middleware(['check.admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
