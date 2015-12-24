<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietaryControlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dietary_controls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->integer('idAnimal');
			$table->foreign('idAnimal')->references('id')->on('animals');
			$table->integer('idFood_Supplemet');
			$table->foreign('idFood_Supplemet')->references('id')->on('food__supplements');
			$table->double('Dosage')->nullable();
			$table->double('value')->nullable();
			$table->string('responsible')->nullable();
			$table->string('dateApplication')->nullable();


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
		Schema::drop('dietary_controls');
	}

}
