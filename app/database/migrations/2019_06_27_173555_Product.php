<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration {

	/**
	 * Run the migrations.
	 *  
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->integer('size')->unsigned();
			$table->integer('color')->unsigned();
			$table->string('image')->nullable();
			$table->decimal('amount', 6, 2)->default(0);
			$table->integer('type')->unsigned();
			$table->string('status', 1);
			$table->timestamps();
			
			$table->index(array('color', 'type'));
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('product');
	}

}
