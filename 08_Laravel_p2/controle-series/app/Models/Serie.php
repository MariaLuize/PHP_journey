<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    // Para ignorar o campo timestamps da tabela Series
    public $timestamps = false;
    protected $fillable = ['name', 'network'];

    /**
     * Tipos de relacionamento entre classes (CARDINALIDADE)
     * belongsTo, hasMany, hasOne, belongsToMany.
     */
    // Relações entre Models, referentes a colunas no DB, por exemplo: 1 para muitos
    public function seasons()
    {
        // a classe Serie pode possuir muitas temporadas. Relação de 1->N
        return $this->hasMany(Season::class);
    }
}
