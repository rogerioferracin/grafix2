<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('logradouro', 120);
			$table->string('numero', 10);
			$table->string('complemento', 40);
			$table->string('bairro', 90);
			$table->string('cidade', 90);
			$table->string('uf', 2);
			$table->string('cep', 15);
			$table->mediumText('observacoes');

            //Realtions
            $table->integer('endereco_morph_id')->unsigned();
            $table->string('endereco_morph_type');

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
		Schema::drop('enderecos');
	}

}
