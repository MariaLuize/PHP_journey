<?php

namespace App\Services;

use App\Models\{Serie, Season, Episode};
use Illuminate\Support\Facades\DB;

class SeriesRemover
{
    public function removeSerie(int $serieId): string
    {
        $nameSerie = '';
        DB::transaction( function () use ($serieId, &$nameSerie){
            $serie      = Serie::find($serieId);
            $nameSerie  = $serie->name;
            $this->removeSeasons($serie);
            $serie->delete();
        });
        return $nameSerie;
    }

    private function removeSeasons(Serie $serie): void
    {
        $serie->seasons->each(function (Season $season) {
           $this->removeEpisodes($season);
           $season->delete();
        });
    }

    private function removeEpisodes(Season $season): void
    {
        $season->episodes()->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}