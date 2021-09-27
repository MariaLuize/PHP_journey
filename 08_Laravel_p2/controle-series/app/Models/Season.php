<?php
// Como gerar um modelo na linha de comando (php artisan make:model NomeModelo -m), a flag -m tbm gera as migrations necessárias para o modelo
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
