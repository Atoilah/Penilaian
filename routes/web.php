<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;

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
// Route::get('/create', [GuruController::class,'create']);
Route::post('/guru/store', [GuruController::class, 'store']);
// Route::get('/{NIP}/edit', [GuruController::class,'edit']);
Route::put('/guru/{NIP}', [GuruController::class, 'update']);
Route::get('/guru/{NIP}/hapus', [GuruController::class, 'hapus']);
Route::delete('/guru/{NIP}', [GuruController::class, 'delete']);
Route::get('/guru/cari', [GuruController::class, 'cari']);


Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/mapel/store', [MapelController::class, 'store']);
Route::put('/mapel/{MapelId}', [MapelController::class, 'update']);
Route::get('/mapel/{MapelId}/hapus', [MapelController::class, 'hapus']);
Route::delete('/mapel/{MapelId}', [MapelController::class, 'delete']);

Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusan/store', [JurusanController::class, 'store']);
