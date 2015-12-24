<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinationControl extends Model {

		protected $table = 'vaccination_controls';
		protected $fillable = ['idUser','animalName','diseaseName','vaccineName','dateApplication','dose','responsible','boosterInjection'];
		protected $guarded = ['id'];

}
