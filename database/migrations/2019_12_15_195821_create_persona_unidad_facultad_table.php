<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonaUnidadFacultadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persona_unidad_facultad', function(Blueprint $table)
		{
			$table->integer('id_persona')->index('persona_unidad_id_persona_idx');
			$table->integer('id_unidad_facultad')->index('persona_unidad_id_unidad_facultad_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('persona_unidad_facultad');
	}

}
