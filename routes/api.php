<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//user
Route::post('signup', [UserController::class, 'signup']); //read or create new account
Route::post('login', [UserController::class, 'login']);

//student
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);

//private route
//before login user have to throgth sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);

    //////////user
    Route::post('logout', [UserController::class, 'logout']);
});
