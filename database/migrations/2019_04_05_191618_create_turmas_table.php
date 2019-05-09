<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTurmasTable.
 */
class CreateTurmasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turmas', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('disciplinas_id')->unsigned();
            $table->foreign('disciplinas_id')
            ->references('id')
            ->on('disciplinas')
            ->onUpdate('cascade')
			->onDelete('cascade');
			
			$table->integer('professores_id')->unsigned();
            $table->foreign('professores_id')
            ->references('id')
            ->on('professores')
            ->onUpdate('cascade')
			->onDelete('cascade');
			
			$table->integer('semestres_id')->unsigned();
            $table->foreign('semestres_id')
            ->references('id')
            ->on('semestres')
            ->onUpdate('cascade')
            ->onDelete('cascade');

			$table->string('nome', 1);

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
		Schema::drop('turmas');
	}
}
