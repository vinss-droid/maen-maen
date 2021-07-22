<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataNilaiController;
use App\Http\Controllers\DataJurnalController;

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

Route::get('/', [HomeController::class, 'index'] )->name('home');
Route::get('/data/jurnal', [DataJurnalController::class, 'index'] )->name('jurnal');
Route::post('/data/jurnal/insert', [DataJurnalController::class, 'jurnalcreate'] );
Route::get('data/jurnal/{id}', [DataJurnalController::class, 'edit'])->name('edit');
Route::put('data/jurnal/{id}', [DataJurnalController::class, 'update']);
Route::delete('data/jurnal/delete/{id}', [DataJurnalController::class, 'destroy']);

Route::get('/data/nilai', [DataNilaiController::class, 'index'] )->name('nilai');
Route::post('/data/nilai/insert', [DataNilaiController::class, 'insert'] );
Route::get('/data/nilai/{id}', [DataNilaiController::class, 'edit'] )->name('edit');
Route::put('/data/nilai/{id}', [DataNilaiController::class, 'update'] );
Route::delete('/data/nilai/delete/{id}', [DataNilaiController::class, 'destroy'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
