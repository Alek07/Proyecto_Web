<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipos', function(Blueprint $table)
		{
			$table->foreign('persona', 'id_persona')->references('cedula')->on('personas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sede', 'id_sede')->references('id')->on('sedes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipos', function(Blueprint $table)
		{
			$table->dropForeign('id_persona');
			$table->dropForeign('id_sede');
		});
	}

}
