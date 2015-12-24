<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Injection extends Model {

	protected $table = 'injections';
	protected $fillable = ['idUser','idProvider','name','indications','Dosage','composition','application','precautions','effects','image','size','price','price_ml','due_date'];
	protected $guarded = ['id'];
}


	



