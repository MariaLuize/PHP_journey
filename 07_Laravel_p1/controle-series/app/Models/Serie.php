<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    // Para ignorar o campo timestamps da tabela Series
    public $timestamps = false;
    protected $fillable = ['name', 'network'];
}
