<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_requisitos', function (Blueprint $table) {
            $table->integer('disciplinas_id')->unsigned();
            $table->foreign('disciplinas_id')
            ->references('id')
            ->on('disciplinas')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('pre_requisito_id')->unsigned();
            $table->foreign('pre_requisito_id')
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
        Schema::dropIfExists('pre_requisitos');
    }
}
