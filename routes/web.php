<?php

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
        'galleries' => Gallery::all()->where('status', '=', true),
    ]);
});

// route model binding
Route::get('/gallery/{gallery:slug}', function (Gallery $gallery) {
    return view('dashboard.gallery', [
        'title' => 'Gallery',
        'users' => User::all(),
        'gallery' => $gallery,
    ]);
});
