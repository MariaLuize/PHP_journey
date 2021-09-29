<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SeriesController, SeasonsController, EpisodesController, LoginController, RegistryController};
use Illuminate\Support\Facades\Auth;

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

// Seasons and Episodes
Route::get('/series/{serieId}/seasons', [SeasonsController::class,'index'])->name('seasons.index');;
Route::get('/seasons/{seasonId}/episodes', [EpisodesController::class,'index']);
Route::post('/seasons/{seasonId}/episodes/watch', [EpisodesController::class,'watch']);

// Login
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);

// Registry
Route::get('/registry', [RegistryController::class,'create']);
Route::post('/registry', [RegistryController::class,'store']);

// Logout
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});