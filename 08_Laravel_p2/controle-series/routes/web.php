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


/**
 * Decidimos que vamos proteger apenas algumas rotas da nossa aplicação. Assim, usuários anônimos (não logados) 
 * poderão consultar as séries cadastradas e suas temporadas, mas não editá-las ou cadastrar novas. Para isso, 
 * definimos que o Middleware de autenticação do Laravel só seria utilizado nas rotas que desejássemos, a partir do 
 * arquivo de rotas web.php
 * Outras formas configurar políticas de autenticação são:
 * Ao configurar o Middleware no Controller (com $this->middleware('nome.do.middleware') no construtor) as 
 * requisições para todos os seus métodos passarão pelo Middleware. Já adicionando a um dos grupos em kernel.php, 
 * todas as rotas pertencentes ao grupo em questão terão este Middleware configurado.
 */

// Padrão de nome dos métodos: https://laravel.com/docs/8.x/controllers#resource-controllers
Route::get('/series', [SeriesController::class,'index'])->name('series.index');
Route::get('/series/create', [SeriesController::class,'create'])->name("create_series")->middleware('authBR');
Route::post('/series/create', [SeriesController::class,'store'])->middleware('authBR');
Route::delete('/series/{id}', [SeriesController::class,'destroy'])->middleware('authBR');

Route::post('/series/{id}/editName', [SeriesController::class,'update'])->middleware('authBR');

// Seasons and Episodes
Route::get('/series/{serieId}/seasons', [SeasonsController::class,'index'])->name('seasons.index');
Route::get('/seasons/{seasonId}/episodes', [EpisodesController::class,'index']);
Route::post('/seasons/{seasonId}/episodes/watch', [EpisodesController::class,'watch'])->middleware('authBR');

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