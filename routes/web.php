<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
Route::get('/addvideo', function () {
    return view('addvideo');
});
Route::get('/', [MainController::class, 'index']);

Route::get('/registration', function () {
    return view('registration');
});
Route::get('/authorization', function () {
    return view('authorization');
});

Route::get('/{id}/video', [VideoControllers::class, 'Video_view']);

Route::get('/myvideo', function () {
    return view('myvideo');
});
Route::get('/addvideo', function () {
    return view('addvideo');
});


Route::get('/admin/index', [MainController::class, 'index_admin']);

Route::post('authorization_validate', [UserController::class, 'authorization_validate'])->name('authorization_validate');
Route::post('registration_validate', [UserController::class, 'registration_validate']);
Route::get('sign_out', [UserController::class, 'sign_out']);

Route::get('/addvideo', [MainController::class, 'addvideo']);
Route::post('/addvideo_valid', [MainController::class, 'addvideo_valid']);
Route::get('/{id}/video', [MainController::class, 'video']);

Route::post('/{id}/comment_create', [MainController::class, 'comment_create']);

Route::get('/myvideo', [MainController::class, 'personalVideo_view']);

Route::post('/{id}/edit_limits', [MainController::class, 'edit_limits']);

Route::get('/{id}/like_add', [MainController::class, 'like_add']);
Route::get('/{id}/Dislike_add', [MainController::class, 'Dislike_add']);
