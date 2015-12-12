<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Injection extends Model {

	protected $table = 'injections';
	protected $fillable = ['name','descrition','image'];

	


}
