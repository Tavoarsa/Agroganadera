<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinationControlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vaccination_controls', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->string('animalName');			
			$table->string('diseaseName');	
			$table->string('vaccineName');					
			$table->string('dateApplication');		
			$table->string('dose');
			$table->double('value')->nullable();
			$table->string('responsible');
			$table->string('boosterInjection');
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
		Schema::drop('vaccination_controls');
	}

}
