<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(int $seasonId)
    { //Recebemos da url o id da temporada (seasonId)
        $season   = Season::find($seasonId);

        $episodes = $season->episodes;

        return view('episodes.index', compact('episodes'));
    }
}
