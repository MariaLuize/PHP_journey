<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie,Season};

class SeasonsController extends Controller
{
    public function index(int $serieId, Request $request) //exibição das temporadas
    {
        // // lista de temporadas, buscar as temporadas de uma série
        $serieName   = Serie::find($serieId)->name;
        // $seasons = $serie->seasons;

        // Query para a Season, onde o campo serie_id é igual ao id da Serie em questão. Após ter criado a query, o método get traz os resultados. 
        $seasons = Season::query()
        // Chave estrangeira nomeada de serie_id na tabela de seasons
            ->where('serie_id', $serieId)->orderBy('number')->get();

        $message = $request->session()->get(key: 'message');
        $request->session()->remove('message');

        return view('seasons.index', compact('seasons','serieName', 'message'));
    }
}
