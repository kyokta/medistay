<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHospitalController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\RsRoomController;

Route::redirect('/', '/homepage');

// Tampilkan form login
Route::get('/login/admin-medistay', [AdminHospitalController::class, 'showLoginForm'])->name('login');

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
});

Route::get('/hospitals', [HospitalController::class, 'index']);

Route::get('/getHospitalData/{id}', [RsRoomController::class, 'show']);

Route::get('/getDropdownData/{hospitalId}', [RsRoomController::class, 'getDropdownData']);

Route::get('/getRoomsByHospital/{hospitalId}', [RsRoomController::class, 'getRoomsByHospital']);


