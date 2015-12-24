<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model {

		protected $table = 'vaccines';
		protected $fillable = ['idUser','idProvider','nameV','indications','Dosage','composition','application','precautions','effects','image','size','price','price_ml','due_date'];
		protected $guarded = ['id'];
}
