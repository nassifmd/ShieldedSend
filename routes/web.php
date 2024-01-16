<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [FileController::class, 'index']);
Route::post('/upload', [FileController::class, 'upload']);
Route::get('/download', [FileController::class, 'downloadForm']);
Route::post('/download', [FileController::class, 'download']);

Route::get('/upload', [FileController::class, 'index']);
Route::post('/upload', [FileController::class, 'upload'])->name('upload'); 
Route::get('/download', [FileController::class, 'downloadForm'])->name('download'); 


Route::get('/showPrivateKey/{serial_number}', 'App\Http\Controllers\FileController@showPrivateKey')->name('showPrivateKey');


