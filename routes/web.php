<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\TestSchoolController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunPpdbController;
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
// CRUD User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// CRUD Akun PPDB
Route::get('/akun-ppdb', [AkunPpdbController::class, 'index'])->name('akun-ppdb');
Route::get('/akun-ppdb/create', [AkunPpdbController::class, 'create'])->name('akun-ppdb.create');
Route::post('/akun-ppdb/store', [AkunPpdbController::class, 'store'])->name('akun-ppdb.store'); 


// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

// Test School
Route::get('/test-school', [TestSchoolController::class, 'index'])->name('test-school');
Route::post('/test-school/get-school-data', [TestSchoolController::class, 'getSchoolData'])->name('test-school/get-school-data');
