<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');


Route::middleware('auth:api')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    /* Rotas do CRUD */
    Route::get('/list', [UserController::class, 'index'])->middleware('permission:read');
    Route::post('/store/user', [UserController::class, 'store'])->middleware('permission:create');
    Route::get('/user/{id}/edit', [UserController::class, 'show'])->middleware('permission:read');
    Route::put('/update/{id}/user', [UserController::class, 'update'])->middleware('permission:update');
    Route::delete('/delete/{id}/user', [UserController::class, 'destroy'])->middleware('permission:delete');
});




