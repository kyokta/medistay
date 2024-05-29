<?php

use App\Http\Controllers\AdminHospitalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\RsRoomController;
use App\Models\RsRoom;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'registrasi']);

Route::middleware(['auth:sanctum'])->group(function (){

});
Route::apiResource('Medistay', RsRoomController::class);
Route::apiResource('hospital', HospitalController::class);
Route::apiResource('AdminHospital', AdminHospitalController::class);

