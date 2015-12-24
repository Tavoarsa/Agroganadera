<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InjecctionControl extends Model {

		protected $table = 'injecction_controls';
		protected $fillable = ['idUser','animalName','diseaseName','injectionName','dateApplication','dose','responsible','boosterInjection'];
		protected $guarded = ['id'];

}
