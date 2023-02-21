<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/user')->group(function () {
    route::post('/login', [LoginController::class, 'loginUser']);
    route::post('/register', [RegisterController::class, 'register']);
})->middleware('auth:api');
