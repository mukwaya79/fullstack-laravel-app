<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\TimeLogController;

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



Route::get('/',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('admin');

Route::get('/register',[AuthController::class,'register'])->middleware('admin');
Route::post('/logincheck',[AuthController::class,'logincheck'])->name('auth.logincheck');

Route::post('/check',[AuthController::class,'check'])->name('auth.check');
Route::post('/create',[AuthController::class,'create'])->name('auth.create')->middleware('admin');

Route::get('/dashboard',[TimeLogController::class,'index'])->name('dashboard')->middleware('admin');
Route::get('/users',[AuthController::class,'users'])->name('users')->middleware('admin');

Route::get('/edit/{id}',[AuthController::class,'edit'])->middleware('admin');
Route::post('update',[AuthController::class,'update'])->name('update')->middleware('admin');

Route::get('/delete/{id}',[AuthController::class,'delete'])->middleware('admin');

Route::post('/dashboard',[TimeLogController::class,'store'])->name('timelog.dashboard')->middleware('admin');
Route::get('/dashboard2',[TimeLogController::class,'timeout'])->name('dashboard2')->middleware('admin');

Route::post('/dashboard2',[TimeLogController::class,'timeout'])->name('dashboard3')->middleware('admin');

Route::get('/report',[TimelogController::class,'report'])->name('report')->middleware('admin');