<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie,Season,Episode};

class EpisodesController extends Controller
{
    public function index(int $seasonId, Request $request)
    { //Recebemos da url o id da temporada (seasonId)
        $season   = Season::find($seasonId);
        $episodes = $season->episodes;

        $message = $request->session()->get(key: 'message');
        $request->session()->remove('message');

        return view('episodes.index', compact('episodes', 'seasonId', 'season','message'));
    }

    public function watch(int $seasonId, Request $request)
    {
        // Ao chamar as informações recebidas pelo request, temos no array apenas os ids dos episódios já assistidos
        // Dessa forma, é necessário percorrer todos os episódios da temporada em questão, para a atualização do estatus de assistido de cada um deles
        $watchedEpisodes = $request->episodes;  // episodes é o nome dado ao <input>, como name="episodes[]" 
        $currentSeason   = Season::find($seasonId);

        // O caomando each percorre todas os episódios na Collection episodes de uma temporada
        $currentSeason->episodes->each(function (Episode $episode) use($watchedEpisodes) {
            /**
             * Para cada episódios da temporada em questão, somente os episódios cujo id estiverem no array
             * $watchedEpisodes serão marcados com seu atributo watched para true, os que não estiverem no array
             * recebem o valor default, configurado na migration AddWatchedField, ao qual é false */
            $episode->watched = in_array( $episode->id, $watchedEpisodes);
        });
        $currentSeason->push(); // Esse comando sinaliza $currentSeason enviar e salvar todas as suas modificações no DB
        
        $request->session()
        ->flash( // Uma Flash Message é uma mensagem na sessão HTTP, que durará apenas uma requisição, ou seja, será excluída da sessão na requisição seguinte.
            'message',
            "Episódios, da temporada {$currentSeason->number}, marcados como assistidos"
        );
        $currentSeasonId = $currentSeason->serie->id;

        // return redirect()->back();
        return redirect()->route('seasons.index', ['serieId'=>$currentSeasonId]);

    }
}