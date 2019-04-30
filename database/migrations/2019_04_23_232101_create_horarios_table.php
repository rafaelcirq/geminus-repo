<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('turmas_id')->unsigned();
            $table->foreign('turmas_id')
            ->references('id')
            ->on('turmas')
            ->onUpdate('cascade')
			->onDelete('cascade');

            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fim');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}