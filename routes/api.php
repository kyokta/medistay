<?php

use App\Http\Controllers\AdminHospitalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\RsRoomController;
use App\Models\RsRoom;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'registrasi']);
Route::get('/hospitals', [HospitalController::class, 'index']);

// Middleware 'auth:sanctum' tidak diperlukan di sini untuk rute login
// Middleware tersebut biasanya digunakan untuk melindungi rute yang memerlukan autentikasi pengguna.

Route::middleware(['auth:sanctum'])->group(function () {
});

Route::apiResource('Medistay', RsRoomController::class);
Route::apiResource('hospital', HospitalController::class);
Route::apiResource('AdminHospital', AdminHospitalController::class);
