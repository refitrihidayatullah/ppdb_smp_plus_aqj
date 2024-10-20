<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\TestSchoolController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DashboardController;
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

Route::get('/user', [UserController::class, 'index']);


// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

// Test School
Route::get('/test-school', [TestSchoolController::class, 'index'])->name('test-school');
Route::post('/test-school/get-school-data', [TestSchoolController::class, 'getSchoolData'])->name('test-school/get-school-data');
