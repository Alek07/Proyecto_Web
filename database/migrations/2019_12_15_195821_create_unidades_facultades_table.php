<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnidadesFacultadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unidades_facultades', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('unidad_facultad', 65)->unique('unidad_facultad_UNIQUE');
			$table->string('url_unidad_facultad', 100);
			$table->string('abreviatura', 5);
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
		Schema::drop('unidades_facultades');
	}

}
