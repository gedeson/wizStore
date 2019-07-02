<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseSolicitation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_solicitation', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('solicitation_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->enum('status', [1, 2, 3]);
			$table->decimal('price', 6, 2)->default(0);
			$table->timestamps();
			$table->foreign('solicitation_id')->references('id')->on('solicitation');
			$table->foreign('product_id')->references('id')->on('product');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_solicitation');
	}

}
