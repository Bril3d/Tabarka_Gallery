<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
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

Route::get('/login', [usercontroller::class,'login'])->name('login');
Route::get('/', [usercontroller::class,'login']);
Route::post('/postlogin', [usercontroller::class,'postlogin']);
Route::get('/register', [usercontroller::class,'register']);
Route::post('/postregister', [usercontroller::class,'postregister']);
Route::get('/logout', [usercontroller::class,'logout']);