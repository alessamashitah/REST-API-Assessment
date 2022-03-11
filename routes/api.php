<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->get('/fetch/users', [App\Http\Controllers\API\UserAPIController::class, 'index']);

Route::middleware('auth:api')->prefix('v1')->group(function(){

    Route::get('/users', [UserAPIController::class,'index']);
    Route::get('/users/show/{user}',[UserAPIController::class,'show']);
    Route::post('/users/create', [UserAPIController::class,'store']);
    Route::post('/users/update/{user}',[UserAPIController::class,'update']);
    Route::delete('/users/{user}',[UserAPIController::class,'destroy']);

}); 
