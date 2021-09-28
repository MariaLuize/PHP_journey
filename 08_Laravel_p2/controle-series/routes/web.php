<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;

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

// Padrão de nome dos métodos: https://laravel.com/docs/8.x/controllers#resource-controllers
Route::get('/series', [SeriesController::class,'index'])->name('series.index');
Route::get('/series/create', [SeriesController::class,'create'])->name("create_series");
Route::post('/series/create', [SeriesController::class,'store']);
Route::delete('/series/{id}', [SeriesController::class,'destroy']);

Route::post('/series/{id}/editName', [SeriesController::class,'update']);

// Seasons
Route::get('/series/{serieId}/seasons', [SeasonsController::class,'index']);
Route::get('/season/{seasonId}/episodes', [EpisodesController::class,'index']);