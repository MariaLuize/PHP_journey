<?php

namespace App\Services;

use App\Models\{Serie, Season};
use Illuminate\Support\Facades\DB;

class SeriesCreator
{
    public function createSerie(string $seriesName, string $seriesNetwork, int $qtySeasons, int $qtyEpisodes):Serie
    {
        $serie = null;
        DB::beginTransaction(); //Inicil de uma transação
        $serie = Serie::create([
            'name'    => $seriesName,
            'network' => $seriesNetwork,
        ]);
        $this->createSeasons($qtySeasons, $qtyEpisodes, $serie);
        DB::commit(); //Final da transação
        
        return $serie;

        /* OLD WAY 
        DB::transaction gerencia os casos de erro automaticamente, fazendo rollback em caso de erro para nós. 
        Utilizando DB::beginTransaction e DB::commit, não precisamos conhecer funções anônimas e suas particularidades de escopo
        
        DB::transaction(function() use($seriesName, $seriesNetwork, $qtySeasons, $qtyEpisodes, &$serie) {
            $serie = Serie::create([
                'name'    => $seriesName,
                'network' => $seriesNetwork,
            ]);

            // Criar temporadas
            $this->createSeason($qtySeasons, $qtyEpisodes, $serie);
    
            // for ($index_season = 1; $index_season <= $qtySeasons; $index_season++) {
            //     // Criando as temporadas para uma série, pois uma série pode ter muitas temporadas
            //     $season = $serie->seasons()->create(['number' => $index_season]);
                
            //     for ($index_episode = 1; $index_episode <= $qtyEpisodes; $index_episode++) {
            //         // Criando os episódios para uma temporadas, pois uma temporada pode ter muitos episódios
            //         $season->episodes()->create(['number' => $index_episode]);
            //     }
            // }
        }); 
        return $serie; */
    }

    private function createSeasons(int $qtySeasons, int $qtyEpisodes, Serie $serie)
    {
        for ($index_season = 1; $index_season <= $qtySeasons; $index_season++) {
            // Criando as temporadas para uma série, pois uma série pode ter muitas temporadas
            $season = $serie->seasons()->create(['number' => $index_season]);
            $this->createEpisodes($qtyEpisodes, $season);
        };
    }

    private function createEpisodes(int $qtyEpisodes, Season $season):void
    {
        for ($index_episode = 1; $index_episode <= $qtyEpisodes; $index_episode++) {
            // Criando os episódios para uma temporadas, pois uma temporada pode ter muitos episódios
            $season->episodes()->create(['number' => $index_episode]);
        };
    }
}