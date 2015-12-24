<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MilkProduction extends Model {

	protected $table = 'milk_productions';
	protected $fillable = ['idUser','idAnimal','morning_production','later_production','total_production','price_production'];
	protected $guarded = ['id'];

}
