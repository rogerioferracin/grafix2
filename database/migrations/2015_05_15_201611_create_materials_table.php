<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materiais', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->string('codigo');
            $table->string('vias', 2);
            $table->string('tipo_de_material');
            $table->string('formato_final');

            $table->integer('cliente_id');

            $table->softDeletes();
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
		Schema::drop('materials');
	}

}
