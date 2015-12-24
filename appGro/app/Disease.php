<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model {

	protected $table ='diseases';
	protected $fillable=['idUser','name','description','symptom','vaccinationAge','boosterInjection'];
	protected $guarded = ['id'];


}
