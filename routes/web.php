<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru/store', [GuruController::class, 'store']);
Route::put('/guru/{NIP}', [GuruController::class, 'update']);
Route::get('/guru/{NIP}/hapus', [GuruController::class, 'hapus']);
Route::get('/guru/cari', [GuruController::class, 'cari']);


Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/mapel/store', [MapelController::class, 'store']);
Route::put('/mapel/{MapelId}', [MapelController::class, 'update']);
Route::get('/mapel/{MapelId}/hapus', [MapelController::class, 'hapus']);

Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusan/store', [JurusanController::class, 'store']);
Route::get('/jurusan/{JurusanId}/hapus', [JurusanController::class, 'hapus']);
Route::put('/jurusan/{JurusanId}', [JurusanController::class, 'update']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/{siswaId}/hapus', [SiswaController::class, 'hapus']);
Route::put('/siswa/{SiswaId}', [SiswaController::class, 'update']);

Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/nilai/store', [NilaiController::class, 'store']);
Route::get('/nilai/{NilaiId}/hapus', [NilaiController::class, 'hapus']);
Route::put('/nilai/{NilaiId}', [NilaiController::class, 'update']);
