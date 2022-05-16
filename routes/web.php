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

// Route::post('/logout',[LoginController::class,'logout']);
Route::post('/logout', [LoginController::class, 'logout']);

//asisten dosen
Route::get('/asisten', [AsistenController::class, 'index'])->middleware('asisten');
Route::get('/presensi', [AsistenController::class, 'presensi']);

//dosen
Route::get('/dosen', [DosenController::class, 'index'])->middleware('dosen');
Route::get('/detail/{id}', [DosenController::class, 'detaildosen']);
Route::get('/dsnpresensi', [DosenController::class, 'dsnpresensi']);
Route::get('/buatpresensi', [DosenController::class, 'buatpresensi']);

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/adduser', [AdminController::class, 'adduser']);
Route::get('/edituser', [AdminController::class, 'edituser']);

//CRUD DATA MATAKULIAH ADMIN
Route::get('/dtmk', [AdminController::class, 'dtmk']);
Route::get('/dtmkadd', [AdminController::class, 'dtmkadd']);
Route::post('/dtmkaddsave', [AdminController::class, 'dtmkaddsave']);
Route::get('/dtmkedit/{id}', [AdminController::class, 'dtmkedit']);
Route::put('/dtmkeditup/{id}', [AdminController::class, 'dtmkeditup']);
Route::get('delmk/{id}', [AdminController::class, 'delmk']);

//CRUD DATA SEMESTER ADMIN
Route::get('/dtsmt', [AdminController::class, 'dtsmt']);

//CRUD DATA RUMUS ADMIN
Route::get('/dtrms', [AdminController::class, 'dtrms']);

//CRUD DATA KELAS ADMIN
Route::get('/dtkelas',  [AdminController::class, 'dtkelas']);
Route::get('/dtkelasadd',  [AdminController::class, 'dtkelasadd']);
Route::post('/dtkelassave',  [AdminController::class, 'dtkelassave']);
Route::get('/dtkelasedit/{id}',  [AdminController::class, 'dtkelasedit']);
Route::put('/dtkelaseditup/{id}', [AdminController::class, 'dtkelaseditup']);
Route::get('/delkelas/{id}',  [AdminController::class, 'delkelas']);

//CRUD DATA DETAIL KELAS ADMIN
Route::get('/dtdetail',  [AdminController::class, 'dtdetail']);
Route::get('/dtdetailadd',  [AdminController::class, 'dtdetailadd']);
Route::post('/dtdetailsave',  [AdminController::class, 'dtdetailsave']);
Route::get('/dtdetailedit/{id}',  [AdminController::class, 'dtdetailedit']);
Route::put('/dtdetaileditup/{id}', [AdminController::class, 'dtdetaileditup']);
Route::get('/deldetail/{id}',  [AdminController::class, 'deldetail']);

//DATA PRESENSI ADMIN
Route::get('/dtpresensi',  [AdminController::class, 'dtpresensi']);
Route::get('/dtpresensi2/{id}',  [AdminController::class, 'dtpresensi2']);

Route::get('/finalisasi', [AdminController::class, 'finalisasi']);

Route::get('/slipgaji', [AdminController::class, 'slipgaji']);

Route::get('/arsip', [AdminController::class, 'arsip']);
