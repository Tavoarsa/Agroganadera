<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model {

	protected $table ='farms';
	protected $fillable=['idUser','name','address','latitude','longitude','agent','operationCertificate','exploitation','patent'];
	protected $guarded = ['id'];

}
