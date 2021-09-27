<?php

namespace App\Services;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SeriesCreator
{
    public function createSerie(string $seriesName, string $seriesNetwork, int $qtySeasons, int $qtyEpisodes):Serie
    {
        $serie = null;
        DB::transaction(function() use($seriesName, $seriesNetwork, $qtySeasons, $qtyEpisodes, &$serie) {
            $serie = Serie::create([
                'name'    => $seriesName,
                'network' => $seriesNetwork,
            ]);
    
            for ($index_season = 1; $index_season <= $qtySeasons; $index_season++) {
                // Criando as temporadas para uma série, pois uma série pode ter muitas temporadas
                $season = $serie->seasons()->create(['number' => $index_season]);
                
                for ($index_episode = 1; $index_episode <= $qtyEpisodes; $index_episode++) {
                    // Criando os episódios para uma temporadas, pois uma temporada pode ter muitos episódios
                    $season->episodes()->create(['number' => $index_episode]);
                }
            }
        });

        return $serie;
    }
}