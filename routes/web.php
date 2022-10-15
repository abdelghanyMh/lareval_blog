<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
/**
 * posts routes 
 * this will handel all crud  methods related to the resource post
 * php artisan make:controller name --resource
 * php artisan route:list
 * https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
 */
Route::resource('posts', PostController::class)->except(['index']);


