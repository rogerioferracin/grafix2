<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('ceps', function(Blueprint $table){
//			$table->bigInteger('id');
//			$table->string('logradouro', 100);
//			$table->string('bairro', 90);
//			$table->string('cidade', 90);
//			$table->string('uf', 2);
//			$table->string('cep', 15);
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ceps');
	}

}
