<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');
/**
 * posts routes 
 * this will handel all crud  methods related to the resource post
 * php artisan make:controller name --resource
 * php artisan route:list
 * https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
 */
Route::resource('posts', PostController::class)->except(['index']);



Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register')->middleware('guest');


Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
