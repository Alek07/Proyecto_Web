<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSedesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sedes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('sede', 60);
			$table->string('abreviatura', 3);
			$table->string('url_sede', 45)->nullable()->unique('url_sede_UNIQUE');
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
		Schema::drop('sedes');
	}

}
