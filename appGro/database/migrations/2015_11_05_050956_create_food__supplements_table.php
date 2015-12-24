<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodSupplementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food__supplements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->string ('nameProduct');
			$table->double('weight');
			$table->double ('price');
			$table->double ('price_kg');
			$table->integer('idProvider');
			$table->foreign('idProvider')->references('id')->on('providers');
			$table->string ('due_date')->nullable();
			$table->string ('image')->nullable();
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
		Schema::drop('food__supplements');
	}

}
