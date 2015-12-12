<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model {

	protected $table ='weights';
	protected $fillable=['idUser','idAnimal','weight','dateWeight'];
	protected $guarded = ['id'];


}
