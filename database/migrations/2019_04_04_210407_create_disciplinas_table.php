<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDisciplinasTable.
 */
class CreateDisciplinasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplinas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('matrizes_id')->unsigned();
            $table->foreign('matrizes_id')
            ->references('id')
            ->on('matrizes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('nome');
			$table->integer('carga_horaria');
			$table->longText('ementa')->nullable();
			$table->integer('periodo');

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
		Schema::drop('disciplinas');
	}
}
