<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CutOffController;

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

Route::get('/results', [ResultsController::class, 'showResults']);

Route::get('/score', [ChartController::class, 'index']);

Route::get('/cut-off', [CutOffController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/record', [RecordController::class, 'showRecordForm']);
Route::post('/record', [RecordController::class, 'store'])->name('record.store');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
