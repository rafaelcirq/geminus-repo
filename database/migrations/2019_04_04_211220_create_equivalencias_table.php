<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquivalenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equivalencias', function (Blueprint $table) {
            $table->integer('disciplinas_id_1')->unsigned();
            $table->foreign('disciplinas_id_1')
            ->references('id')
            ->on('disciplinas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('disciplinas_id_2')->unsigned();
            $table->foreign('disciplinas_id_2')
            ->references('id')
            ->on('disciplinas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('equivalencias');
    }
}
