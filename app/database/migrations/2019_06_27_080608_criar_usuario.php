<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($table)
		{
			$table->increments('id');
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->string('name', 255);
			$table->integer('country')->unsigned();
			$table->enum('role', ['1', '2'])->default('2');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('user');
	}

}
