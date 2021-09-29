<?php
// Migration criada com o comando: php artisan make:migration add_watched_field --table=episodes
// Tal comando indica que a migration criada vai alterar a tabela episodes
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWatchedField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodes', function (Blueprint $table) {
            // Criação do campo (coluna), que aceita valores booleano, "watched" na tabela epidodes, com valor padrão de false
            $table->boolean('watched')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episodes', function (Blueprint $table) {
            // Para reverter essa migration, ou seja, excluir a nnova coluna "watched" criada:
            $table->dropColumn('watched');
        });
    }
}
