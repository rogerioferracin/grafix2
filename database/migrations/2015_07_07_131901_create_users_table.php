<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->boolean('ativo')->default(1);
            $table->mediumText('observacoes');

            $table->integer('funcao_id')->unsigned();
            $table->foreign('funcao_id')->references('id')->on('funcoes');

			$table->rememberToken();
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
		Schema::drop('users');
	}

}
