<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilkProductionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('milk_productions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->integer('idAnimal');
			$table->foreign('idAnimal')->references('id')->on('animals');
			$table->double('morning_production')->nullable();
			$table->double('later_production')->nullable();
			$table->double('total_production')->nullable();
			$table->double('price_production')->nullable();
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
		Schema::drop('milk_productions');
	}

}
