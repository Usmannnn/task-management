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
Route::post('task/sub',[App\Http\Controllers\TaskController::class,'storeSub'])
    ->middleware('auth')
    ->name('task.storeSub');
Route::get('sub/{id}',[App\Http\Controllers\TaskController::class,'getSubTasks'])
    ->middleware('auth')
    ->name('task.subtask');
Route::get('sub/update/{id}/{task_id}/{status}',[App\Http\Controllers\TaskController::class,'getChangeSubStatus'])
    ->middleware('auth')
    ->name('task.subtaskupdate');


Route::resource('notification', App\Http\Controllers\NotificationController::class)
    ->middleware('auth');
Route::get('notification/{id}/{status}',[App\Http\Controllers\NotificationController::class,'getChangeStatus'])
    ->middleware('auth')
    ->name('notifiy.statusChange');

Route::resource('comment', App\Http\Controllers\CommentController::class)
    ->middleware('auth');

Route::resource('message', App\Http\Controllers\MessageController::class)
    ->middleware('auth');
Route::get('message/{id}/{status}',[App\Http\Controllers\MessageController::class,'getChangeStatus'])
    ->middleware('auth')
    ->name('message.statusChange');
