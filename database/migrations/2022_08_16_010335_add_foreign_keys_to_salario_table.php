<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salario', function (Blueprint $table) {
            $table->foreign(['colaborador_id'], 'fk_salario_colaborador')->references(['id'])->on('colaborador')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salario', function (Blueprint $table) {
            $table->dropForeign('fk_salario_colaborador');
        });
    }
}
