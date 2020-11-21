<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('task', App\Http\Controllers\TaskController::class)
    ->middleware('auth');
Route::get('task/{id}/{status}',[App\Http\Controllers\TaskController::class,'getChangeStatus'])
    ->middleware('auth')
    ->name('task.statusChange');

Route::resource('notification', App\Http\Controllers\NotificationController::class)
    ->middleware('auth');
Route::get('notification/{id}/{status}',[App\Http\Controllers\NotificationController::class,'getChangeStatus'])
    ->middleware('auth')
    ->name('notifiy.statusChange');

Route::resource('comment', App\Http\Controllers\CommentController::class)
    ->middleware('auth');
