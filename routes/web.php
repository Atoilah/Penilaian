<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [LayoutController::class, 'welcome']);

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru/store', [GuruController::class, 'store'])->middleware('auth');
Route::put('/guru/{NIP}', [GuruController::class, 'update'])->middleware('auth');
Route::get('/guru/{NIP}/hapus', [GuruController::class, 'hapus'])->middleware('auth');

Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/mapel/store', [MapelController::class, 'store'])->middleware('auth');
Route::put('/mapel/{MapelId}', [MapelController::class, 'update'])->middleware('auth');
Route::get('/mapel/{MapelId}/hapus', [MapelController::class, 'hapus'])->middleware('auth');

Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusan/store', [JurusanController::class, 'store'])->middleware('auth');
Route::get('/jurusan/{JurusanId}/hapus', [JurusanController::class, 'hapus'])->middleware('auth');
Route::put('/jurusan/{JurusanId}', [JurusanController::class, 'update'])->middleware('auth');

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/store', [SiswaController::class, 'store'])->middleware('auth');
Route::get('/siswa/{siswaId}/hapus', [SiswaController::class, 'hapus'])->middleware('auth');
Route::put('/siswa/{SiswaId}', [SiswaController::class, 'update'])->middleware('auth');

Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/nilai/store', [NilaiController::class, 'store'])->middleware('auth');
Route::get('/nilai/{NilaiId}/hapus', [NilaiController::class, 'hapus'])->middleware('auth');
Route::put('/nilai/{NilaiId}', [NilaiController::class, 'update'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
