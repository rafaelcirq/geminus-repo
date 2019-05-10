<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_turmas', function (Blueprint $table) {
            $table->integer('horarios_id')->unsigned();
            $table->foreign('horarios_id')
            ->references('id')
            ->on('horarios')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('turmas_id')->unsigned();
            $table->foreign('turmas_id')
            ->references('id')
            ->on('turmas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios_turmas');
    }
}
