<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FincaForm extends Request {

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
			'nombre'	 		 	=> 'required',	
			'representante'  		=> 'required',
			'certficadoOperacion'   => 'required',
			'explotacion' 			=> 'required',
			'marca'       			=> 'required|mimes:png'

		];
	}

	public function messages()
	{
	    return [
	        'nombre.required' => 'El campo numero es requerido!',
	        'representante.required' => 'El campo numero es requerido!',		
			'certficadoOperacion.required' => 'El campo nombre es requerido!',
			'explotacion.required' => 'El campo especie es requerido!',
	        
	    ];
	}


}
