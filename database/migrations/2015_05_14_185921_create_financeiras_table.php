<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceirasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('financeiras', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome');
            $table->string('agencia');
            $table->string('conta');
            $table->string('taxa_juros');
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
		Schema::drop('financeiras');
	}

}
