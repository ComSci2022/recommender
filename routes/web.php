<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CutOffController;
use App\Http\Controllers\TakerScoreController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/results', [ResultsController::class, 'showResults']);

Route::get('/score', [ChartController::class, 'index']);

Route::get('/cut-off', [CutOffController::class, 'index']);

Route::post('/login', [LoginController::class, 'login'])->name('login.custom');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/record', [RecordController::class, 'showRecordForm']);
Route::post('/record', [RecordController::class, 'store'])->name('record.store');

Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/takerscore', [TakerScoreController::class, 'index'])->name('takerscores.index');
Route::get('/takerscore/create', [TakerScoreController::class, 'create'])->name('takerscores.create');
Route::post('/takerscore', [TakerScoreController::class, 'store'])->name('takerscores.store');
Route::get('/takerscore/{takerScore}/edit', [TakerScoreController::class, 'edit'])->name('takerscores.edit');
Route::put('/takerscore/{taker_id}', [TakerScoreController::class, 'update'])->name('takerscores.update');
Route::delete('/takerscore/{takerScoreId}', [TakerScoreController::class, 'destroy'])->name('takerscores.destroy');
Route::post('/results', [TakerScoreController::class, 'show'])->name('takerscores.show');
Route::post('/takerscore/recommend', [TakerScoreController::class, 'recommendCourse'])->name('takerscores.recommendCourse');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes that require authentication
Route::group(['middleware' => ['auth.redirect']], function () {
    Route::get('/index', [TakerScoreController::class, 'index'])->name('index');

    Route::get('/edit/{id}', function ($id) {
        return view('edit', ['id' => $id]);
    })->name('edit');

    Route::get('/create', function () {
        return view('create');
    })->name('create');

});
