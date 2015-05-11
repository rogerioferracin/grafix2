<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contatos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cargo');
            $table->string('setor');
            $table->string('telefone');
            $table->string('celular');
            $table->string('email');
            $table->string('skype');
            $table->date('aniversario');
            $table->mediumText('observacoes');
            $table->boolean('contato_principal')->default(0);

            //Realtions
            $table->integer('contato_morph_id')->unsigned();
            $table->string('contato_morph_type');

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
		Schema::drop('contatos');
	}

}
