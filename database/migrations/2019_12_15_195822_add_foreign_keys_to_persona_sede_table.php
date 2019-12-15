<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonaSedeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('persona_sede', function(Blueprint $table)
		{
			$table->foreign('id_persona', 'persona_sede_id_persona')->references('id')->on('personas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_sede', 'persona_sede_id_sede')->references('id')->on('sedes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('persona_sede', function(Blueprint $table)
		{
			$table->dropForeign('persona_sede_id_persona');
			$table->dropForeign('persona_sede_id_sede');
		});
	}

}
