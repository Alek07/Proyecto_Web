<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_persona', function(Blueprint $table)
		{
			$table->integer('id_user')->index('user_persona_id_user_idx');
			$table->integer('id_persona')->index('user_persona_id_persona_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_persona');
	}

}
