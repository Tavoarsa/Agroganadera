<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnimalForm extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"id"	  => "required",	
			"numero"  => "required",
			"nombre"  => "required|min:4",
			"especie" => "especie"
		];
	}

	public function messages()
	{
	    return [
	        'numero.required' => 'El campo numero es requerido!',
	        'numero.min' => 'El campo numero no puede tener menos de 5 carácteres',			
			'nombre.required' => 'El campo nombre es requerido!',
			'especie.required' => 'El campo especie es requerido!',
	        
	    ];
	}

}
