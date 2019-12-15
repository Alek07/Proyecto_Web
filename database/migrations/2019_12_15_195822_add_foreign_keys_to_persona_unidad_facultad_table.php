<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonaUnidadFacultadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persona_unidad_facultad', function(Blueprint $table)
		{
			$table->foreign('id_persona', 'persona_unidad_id_persona')->references('id')->on('personas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_unidad_facultad', 'persona_unidad_id_unidad_facultad')->references('id')->on('unidades_facultades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('persona_unidad_facultad', function(Blueprint $table)
		{
			$table->dropForeign('persona_unidad_id_persona');
			$table->dropForeign('persona_unidad_id_unidad_facultad');
		});
	}

}
