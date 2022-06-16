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
Route::put('/mhspresensi/{id}',[AsistenController::class, 'mhspresensi']);
Route::get('/cetakslip',[AsistenController::class, 'cetakslip']);
Route::get('/asisten/pdfslip/{id}',[AsistenController::class, 'pdfslipasisten']);

//dosen
Route::get('/dosen', [DosenController::class, 'index'])->middleware('dosen');
Route::get('/detail/{id}', [DosenController::class, 'detaildosen']);
Route::get('/dsnpresensi', [DosenController::class, 'dsnpresensi']);
Route::get('/buatpresensi', [DosenController::class, 'buatpresensi']);
Route::get('/presensikls', [DosenController::class, 'presensikls'])->name('presensikls');

Route::post('/savepresensi',[DosenController::class, 'savepresensi']);
Route::put('/validasi/{id}',[DosenController::class, 'validasi']);

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/adduser', [AdminController::class, 'adduser']);
Route::post('/saveuser', [AdminController::class, 'saveuser']);
Route::get('/edituser/{id}', [AdminController::class, 'edituser']);
Route::put('/saveedituser/{id}', [AdminController::class, 'saveedituser']);
Route::get('/deluser/{id}', [AdminController::class, 'deluser']);

//CRUD DATA MATAKULIAH ADMIN
Route::get('/dtmk', [AdminController::class, 'dtmk']);
Route::get('/dtmkadd', [AdminController::class, 'dtmkadd']);
Route::post('/dtmkaddsave', [AdminController::class, 'dtmkaddsave']);
Route::get('/dtmkedit/{id}', [AdminController::class, 'dtmkedit']);
Route::put('/dtmkeditup/{id}', [AdminController::class, 'dtmkeditup']);
Route::get('delmk/{id}', [AdminController::class, 'delmk']);

//CRUD DATA SEMESTER ADMIN
Route::get('/dtsmt', [AdminController::class, 'dtsmt']);
Route::get('/addsmt', [AdminController::class, 'addsmt']);
Route::post('/savesmt', [AdminController::class, 'savesmt']);
Route::get('/editsmt/{id}',[AdminController::class, 'editsmt']);
Route::put('/saveeditsmt/{id}',[AdminController::class, 'saveeditsmt']);
Route::get('/delsmt/{id}', [AdminController::class, 'delsmt']);

//CRUD DATA RUMUS ADMIN
Route::get('/dtrms', [AdminController::class, 'dtrms']);
Route::get('/dtrumusadd',  [AdminController::class, 'dtrumusadd']);
Route::post('/dtrumussave',  [AdminController::class, 'dtrumussave']);
Route::get('/dtrumusedit/{id}',  [AdminController::class, 'dtrumusedit']);
Route::put('/dtrumuseditup/{id}', [AdminController::class, 'dtrumuseditup']);
Route::get('/delrumus/{id}',  [AdminController::class, 'delrumus']);

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
Route::get('/dtpresensitgl/{id}',  [AdminController::class, 'dtpresensitgl'])->name('dtpresensitgl');;

Route::get('/finalisasi', [AdminController::class, 'finalisasi']);
Route::get('/finalisasi2/{id}', [AdminController::class, 'finalisasi2'])->name('finalisasi2');
Route::get('/finalisasibytgl/{id}', [AdminController::class, 'finalisasibyTgl'])->name('finalisasibyTgl');
Route::post('/finalisasihasil', [AdminController::class, 'finalisasihasil']);

Route::get('/slipgaji', [AdminController::class, 'slipgaji']);
Route::get('/slipgaji2/{id}', [AdminController::class, 'slipgaji2']);
Route::get('/slipgajitgl/{id}', [AdminController::class, 'slipgajitgl'])->name('slipgajitgl');
Route::get('/slipgaji2/pdfslip/{id}',[AdminController::class, 'pdfslip']);

Route::get('/arsip', [AdminController::class, 'arsip']);
Route::get('/arsip2/{id}', [AdminController::class, 'arsip2']);
Route::get('/arsiptgl/{id}',[AdminController::class, 'arsiptgl'])->name('arsiptgl');
Route::get('/arsip/pdfslip/{id}',[AdminController::class, 'pdfslip']);
