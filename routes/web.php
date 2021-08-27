<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Notifications\CommentNotification;
use App\Http\Controllers\CommentController;

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

Route::view('/', 'register');
Route::view('/login', 'login');

Route::post('sign-up', [UserController::class, 'register'])->name('register');
Route::post('sign-in', [UserController::class, 'login'])->name('login');
Route::post('/sign-out', [UserController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

//Comment Route
Route::post('/comment', [CommentController::class, 'giveComment'])->name('comment');
Route::get('/un_read_comment', [CommentController::class, 'getUnReadComment'])->name('unReadComment');
Route::get('mark_as_read', [CommentController::class, 'markAllCommentAsRead'])->name('markAllRead');