<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model {

	protected $table ='calendars';
	protected $fillable=['idUser','title','body','url','class','start','end'];
	protected $guarded = ['id'];





}