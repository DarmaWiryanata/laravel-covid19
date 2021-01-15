<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;
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

Route::get('', [HomeController::class, 'index'])->name('dasbor');
Route::get('jenis-kelamin', [HomeController::class, 'jk'])->name('jenis-kelamin');
Route::get('pekerjaan', [HomeController::class, 'pekerjaan'])->name('pekerjaan');
Route::get('pendidikan-terakhir', [HomeController::class, 'pendidikan'])->name('pendidikan-terakhir');
Route::get('tahun-lahir', [HomeController::class, 'tahun'])->name('tahun-lahir');
Route::get('wilayah', [HomeController::class, 'wilayah'])->name('wilayah');

Route::name('api.')->prefix('api')->group(function () {
    Route::get('jenis-kelamin', [ApiController::class, 'jks'])->name('jenis-kelamins');
    Route::get('jenis-kelamin/{index}', [ApiController::class, 'jk'])->name('jenis-kelamin');
    Route::get('pekerjaan', [ApiController::class, 'pekerjaans'])->name('pekerjaans');
    Route::get('pekerjaan/{index}', [ApiController::class, 'pekerjaan'])->name('pekerjaan');
    Route::get('pendidikan-terakhir', [ApiController::class, 'pendidikans'])->name('pendidikan-terakhirs');
    Route::get('pendidikan-terakhir/{index}', [ApiController::class, 'pendidikan'])->name('pendidikan-terakhir');
    Route::get('tahun-lahir', [ApiController::class, 'tahuns'])->name('tahun-lahirs');
    Route::get('tahun-lahir/{index}', [ApiController::class, 'tahun'])->name('tahun-lahir');
    Route::get('wilayah', [ApiController::class, 'wilayah'])->name('wilayah');
});