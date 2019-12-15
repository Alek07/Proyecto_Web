<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cedula', 15)->nullable()->unique('cedula_UNIQUE');
			$table->string('primer_nombre', 50)->nullable();
			$table->string('segundo_nombre', 50)->nullable();
			$table->string('apellido_paterno', 50)->nullable();
			$table->string('apellido_materno', 50)->nullable();
			$table->string('full_name', 200)->index('idx_full_name');
			$table->boolean('sexo')->nullable()->default(1);
			$table->boolean('externo')->default(0);
			$table->date('fecha_nacimiento')->nullable()->default('1960-01-01');
			$table->integer('id_estado_civil')->nullable()->default(1)->index('id_estado_civil_idx');
			$table->text('dir_postal', 65535)->nullable();
			$table->string('tel_oficina', 45)->nullable();
			$table->string('tel_residencia', 45)->nullable();
			$table->string('fax', 45)->nullable();
			$table->string('tel_celular', 45)->nullable();
			$table->string('imagen', 200)->nullable()->default('user_2.png');
			$table->string('cargo', 80)->nullable();
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
		Schema::drop('personas');
	}

}
