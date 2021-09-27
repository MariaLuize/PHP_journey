<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps = false;

    public function season()
    {
        // a classe Epsode pertence a uma temporada. Relação de 1->1
        return $this->belongsTo(Season::class);
    }
}
