<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vaccines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idUser');
			$table->foreign('idUser')->references('id')->on('users');
			$table->integer('idProvider');
			$table->foreign('idProvider')->references('id')->on('providers');
			$table->string ('name');			
			$table->string ('indications')->nullable();
			$table->string('Dosage')->nullable();
			$table->string ('composition')->nullable();
			$table->string ('application')->nullable();
			$table->string ('precautions')->nullable();	
			$table->string ('effects')->nullable();		
			$table->string ('image')->nullable();

			$table->double('size')->nullable();
			$table->double('price')->nullable();
			$table->double ('price_ml')->nullable();			
			$table->string ('due_date')->nullable();			
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
		Schema::drop('vaccines');
	}

}
