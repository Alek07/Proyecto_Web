<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code', 10);
			$table->string('nombre', 60)->nullable();
			$table->boolean('availability')->nullable();
			$table->integer('sede')->index('id_sede');
			$table->string('persona')->index('id_persona');
			$table->string('descripcion', 500)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipos');
	}

}
