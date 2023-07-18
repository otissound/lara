<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

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




Route::post('/register', [User::class, 'register']);
Route::post('/reset-password', [User::class, 'resetPassword']);
Route::post('/update-profile', [User::class, 'updateProfile']);
Route::post('/update-profile-photo', [User::class, 'updateProfilePhoto']);
