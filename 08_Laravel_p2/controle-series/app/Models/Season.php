<?php
// Como gerar um modelo na linha de comando (php artisan make:model NomeModelo -m), a flag -m tbm gera as migrations necessárias para o modelo
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Collection};
use App\Models\Episode;


class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps  = false;
    
    // Relações entre Models, referentes a colunas no DB, por exemplo: 1 para muitos
    public function episodes()
    {
        // a classe Season pode possuir muitos episódios. Relação de 1->N
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        // a classe Season pertence a uma série. Relação de 1->1
        return $this->belongsTo(Serie::class);
    }

    public function getWatchedEpisodes():Collection
    {
        /** 
         * O método filter() recebe uma closure (função anônima), que por sua vez 
         * recebe um item da coleção por parâmetro. Para cada item da coleção, 
         * esta closure será chamada e retornará true (verdadeiro) se o item atual deve 
         * fazer parte da lista retornada ou false (falso) caso contrário. O PHP fornece 
         * uma função para nós implementarmos este mesmo comportamento em arrays, chamada array_filter */
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->watched; //Só retorna os epis em que "watched" for true
        });
    }
}
