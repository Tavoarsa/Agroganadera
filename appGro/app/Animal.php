<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {

	protected $table ='animals';
	protected $fillable=['idUser','numeroAnimal','nombre','idPadre','idMadre','raza','genero',
						'fechaNacimiento','pesoNacimiento','fechaMuerte','observaciones','image'];
	protected $guarded = ['id'];



}



