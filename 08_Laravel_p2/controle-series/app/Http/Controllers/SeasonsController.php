<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie,Season};

class SeasonsController extends Controller
{
    public function index(int $serieId) //exibição das temporadas
    {
        // // lista de temporadas, buscar as temporadas de uma série
        // $serie   = Serie::where('id', $serieId)->get();
        // $seasons = $serie->seasons;

        // Query para a Season, onde o campo serie_id é igual ao id da Serie em questão. Após ter criado a query, o método get traz os resultados. 
        $seasons = Season::query()
        // Chave estrangeira nomeada de serie_id na tabela de seasons
            ->where('serie_id', $serieId)->orderBy('number')->get();

        return view('seasons.index', compact('seasons',));
    }
}
