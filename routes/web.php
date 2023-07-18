<?php


use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/register', [User::class, 'register']);
Route::post('/reset-password', [User::class, 'resetPassword']);
Route::post('/update-profile', [User::class, 'updateProfile']);
Route::post('/update-profile-photo', [User::class,'updateProfilePhoto']);
