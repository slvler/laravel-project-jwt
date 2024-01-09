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


Route::group(['middleware' => 'api' ], function ($router) {
    Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'check']);
    Route::post('/refresh',[\App\Http\Controllers\Auth\LogoutController::class, 'refresh']);

});

Route::post('/profile',[\App\Http\Controllers\ProfileController::class, 'profile'])->middleware('api');

Route::get('/address',[\App\Http\Controllers\AddressController::class, 'index'])->middleware('jwt.auth');
Route::get('/address/list',[\App\Http\Controllers\AddressController::class, 'list'])->middleware('jwt.auth');
Route::post('/address/store',[\App\Http\Controllers\AddressController::class, 'store'])->middleware('jwt.auth');
Route::get('/address/show/{id}',[\App\Http\Controllers\AddressController::class, 'show'])->middleware('jwt.auth');
Route::put('/address/update/{address}',[\App\Http\Controllers\AddressController::class, 'update'])->middleware('jwt.auth');
Route::delete('/address/delete/{id}',[\App\Http\Controllers\AddressController::class, 'delete'])->middleware('jwt.auth');


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

#Route::get('/account',[AccountController::class, 'index']);
#Route::post('/account/store',[AccountController::class, 'store']);


#Route::post('/product/store',[ProductController::class, 'store']);
