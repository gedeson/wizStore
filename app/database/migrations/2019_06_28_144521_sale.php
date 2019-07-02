<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sale extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{		
		Schema::create('sale', function(Blueprint $table)
		{
			$table->increments('id');
		
			//foreing key
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->
					references('id')->
					on('user')->
					onDelete('cascade');
			
			
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->
					references('id')->
					on('product')->
					onDelete('cascade');
			
			$table->integer('amount');
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
		Schema::drop('sale');
	}

}
