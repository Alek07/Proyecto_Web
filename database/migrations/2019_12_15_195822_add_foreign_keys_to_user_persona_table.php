<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserPersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_persona', function(Blueprint $table)
		{
			$table->foreign('id_persona', 'user_persona_id_persona')->references('id')->on('personas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_user', 'user_persona_id_user')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_persona', function(Blueprint $table)
		{
			$table->dropForeign('user_persona_id_persona');
			$table->dropForeign('user_persona_id_user');
		});
	}

}
