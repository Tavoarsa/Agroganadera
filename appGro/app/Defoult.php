<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Defoult extends Model {

		protected $table = 'defaults';
		protected $fillable = ['name','image'];
}



