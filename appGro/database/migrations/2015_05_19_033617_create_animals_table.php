<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('animals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');			
			$table->integer('numeroAnimal')->unique();
			$table->string('nombre');
			$table->integer('idPadre');
			$table->integer('idMadre');						
			$table->string('raza');
			$table->string('genero');
			$table->date('fechaNacimiento');			
			$table->double('pesoNacimiento');
			$table->double('pesoDestete')->nullable();		
			$table->date('fechaMuerte')->nullable();
			$table->text('observaciones');
			$table->string('image')->nullable();								
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
		Schema::drop('animals');
	}

}
