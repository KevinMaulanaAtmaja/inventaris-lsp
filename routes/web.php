<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SiswaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('checkLogin')->group(function(){
    // AuthController
    Route::get('/', [AuthController::class, 'loginLayout'])->middleware('checkTamu');
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');


    // SiswaController
    // Route::resource('/siswa', SiswaController::class);
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/create', [SiswaController::class, 'create']);
    Route::post('/siswa/store', [SiswaController::class, 'store']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update'])->name('update');
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);


    // BarangController
    Route::resource('/barang', BarangController::class);

    // PeminjamanController
    Route::resource('/peminjaman', PeminjamanController::class);
});



// AuthController
Route::get('/auth/register', [AuthController::class, 'registerLayout'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'loginLayout'])->name('login')->middleware('checkTamu');
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('checkTamu');
