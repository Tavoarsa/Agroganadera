<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryControl extends Model {

	protected $table ='dietary_controls';
	protected $fillable=['idUser','idAnimal','idFood_Supplemet','Dosage','value','responsible','dateApplication'];
	protected $guarded = ['id'];

	//

}
