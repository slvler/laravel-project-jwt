<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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



//Route::post('login', 'AuthController@login');
//Route::post('logout', 'AuthController@logout');
//Route::post('refresh', 'AuthController@refresh');
//Route::post('me', 'AuthController@me');

Route::post('/login',[\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'check']);

#Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
#    return $request->user();
#});

#Route::get('/account',[AccountController::class, 'index']);
#Route::post('/account/store',[AccountController::class, 'store']);


#Route::post('/product/store',[ProductController::class, 'store']);
