<?php

use App\Http\Controllers\DashboardPesertaController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/dashboard/pesertas', DashboardPesertaController::class)->middleware('auth')->except('show');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth')->except('show');

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'home');
    Route::get('/about', 'about');
});

Route::controller(PesertaController::class)->group(function(){
    Route::get('/pesertas', 'index');
});

Route::controller(PostController::class)->group(function(){
    Route::get('/posts', 'index');
    Route::get('/posts/{post:slug}', 'show');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'index')->middleware('auth');
    Route::post('/register', 'store');
});

Route::redirect('/dashboard', '/dashboard/pesertas');