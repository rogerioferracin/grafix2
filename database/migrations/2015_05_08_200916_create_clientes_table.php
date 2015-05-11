<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj_cpf');
            $table->string('ie_rg');
            $table->string('im');
            $table->date('cliente_desde');
            $table->mediumText('observacoes');
            $table->boolean('ativo')->default(true);

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
		Schema::drop('clientes');
	}

}
