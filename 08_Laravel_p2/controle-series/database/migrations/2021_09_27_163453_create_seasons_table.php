<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('number'); //número da temporada, se é a primeira, segunda e etc
            $table->integer('serie_id'); //referencia pro id da série 
            // $table->timestamps();

            // Chave estrangeira
            $table->foreign('serie_id') // referência serie_id é uma chave estrangeira
                ->references('id') // Que referencia o campo id
                ->on('series'); //presente na classe(tabela) Series
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
