<?php

use App\Http\Controllers\UserController;
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
    return view('index');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/authorization', function () {
    return view('authorization');
});
Route::get('/video', function () {
    return view('video');
});
Route::get('/myvideo', function () {
    return view('myvideo');
});
Route::get('/addvideo', function () {
    return view('addvideo');
});
Route::get('/admin', function () {
    return view('admin.index');
});

Route::post('authorization_validate', [UserController::class, 'authorization_validate'])->name('authorization_validate');
Route::post('registration_validate', [UserController::class, 'registration_validate']);
Route::get('sign_out', [UserController::class, 'sign_out']);
