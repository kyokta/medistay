<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHospitalController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Tampilkan form login
Route::get('/login', [AdminHospitalController::class, 'showLoginForm'])->name('login');

// Operasi CRUD untuk admin rumah sakit
Route::get('/admins', [AdminHospitalController::class, 'index']);
Route::get('/admins/{admin}', [AdminHospitalController::class, 'show']);
Route::post('/admins', [AdminHospitalController::class, 'store']);
Route::put('/admins/{admin}', [AdminHospitalController::class, 'update']);
Route::delete('/admins/{admin}', [AdminHospitalController::class, 'destroy']);

// Operasi autentikasi
Route::post('/login', [AdminHospitalController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminHospitalController::class, 'logout'])->name('logout');

Route::get('/homepage', function () {
    return view('homepage');
})->middleware('auth:admin_hospital');


