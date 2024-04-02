<?php

use App\Http\Controllers\AddPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Gallery;
use App\Models\User;
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
    return view('dashboard.dashboard', [
        'title' => 'Dashboard',
        'users' => User::all(),
        'galleries' => Gallery::orderBy('created_at', 'desc')->where('status', '=', true)->get(),
    ]);
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/{user:name}', [ProfileController::class, 'indexUser'])->middleware('auth');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/update-profile', [ProfileController::class, 'update'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authentication', [UserController::class, 'authentication']);

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'registStore']);

// Route::resource('/profile/post', AddPostController::class)->middleware('auth');
Route::get('/profile/post/create', [AddPostController::class, 'create'])->middleware('auth');
Route::post('/profile/post/store', [AddPostController::class, 'store'])->middleware('auth');
Route::post('/profile/post/update', [AddPostController::class, 'update'])->middleware('auth');
Route::get('/profile/post/destroy/{gallery:slug}', [AddPostController::class, 'destroy'])->middleware('auth');
