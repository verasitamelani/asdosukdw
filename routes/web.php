<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;

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
//login
Route::get('/', [LoginController::class, 'index']);
Route::post('/',[LoginController::class,'authenticate']);

Route::post('/logout',[LoginController::class,'logout']);

//asisten dosen
Route::get('/asisten', [AsistenController::class, 'index'])->middleware('asisten');
Route::get('/presensi', [AsistenController::class, 'presensi']);

//asisten dosen
Route::get('/dosen', [DosenController::class, 'index'])->middleware('dosen');
Route::get('/detail', [DosenController::class, 'detaildosen']);
Route::get('/dsnpresensi', [DosenController::class, 'dsnpresensi']);
Route::get('/buatpresensi', [DosenController::class, 'buatpresensi']);

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/adduser', [AdminController::class, 'adduser']);
Route::get('/edituser', [AdminController::class, 'edituser']);

Route::get('/dtmk', [AdminController::class, 'dtmk']);

Route::get('/dtsmt', [AdminController::class, 'dtsmt']);

Route::get('/dtrms', [AdminController::class, 'dtrms']);

Route::get('/dtkelas',  [AdminController::class, 'dtkelas']);

Route::get('/dtdetail',  [AdminController::class, 'dtdetail']);

Route::get('/dtpresensi',  [AdminController::class, 'dtpresensi']);

Route::get('/finalisasi', [AdminController::class, 'finalisasi']);

Route::get('/slipgaji', [AdminController::class, 'slipgaji']);

Route::get('/arsip', [AdminController::class, 'arsip']);
