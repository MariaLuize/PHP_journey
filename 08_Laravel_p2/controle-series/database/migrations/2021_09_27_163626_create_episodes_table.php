<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->integer('number'); //número do episódio
            $table->integer('season_id'); //referencia pro id da temporada 

            // Chave estrangeira
            $table->foreign('season_id') // referência season_id é uma chave estrangeira
                ->references('id') // Que referencia o campo id
                ->on('seasons'); //presente na classe(tabela) Seasons
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
