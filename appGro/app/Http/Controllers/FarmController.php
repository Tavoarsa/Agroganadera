<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Mail;

use App\Farm;
use App\Defoult;


use Session;

class FarmController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		//$user=Auth::id();

		$id_users= Auth::id(); 

		$farms = Farm::where('idUser',$id_users)-> get();
			//dd($farms);
		

		return view('farms.index', compact('farms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("farms.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)

	{
		$rules =array(
			'name'	 		 		=> 'required',	
			'agent'  				=> 'required',
			'operationCertificate'  => 'required',			
			'address'       		=> 'required'
			);

		$this->validate($request,$rules);

		$farm = new \App\Farm($request->all());
		$id_users= Auth::id(); 
		$farm->idUser = $id_users; 
		$farm->latitude = "120";
		$farm->longitude = "120";

		if (Input::hasFile('patent')) {

		$file = Input::file('patent');//Creamos una instancia de la libreria instalada
		$patent = \Image::make(\Input::file('patent'));//Ruta donde queremos guardar las imagenes
		$path = 'img/patent/';			
			// Cambiar de tamaño
		$patent -> resize(450, 450);
		$patent -> save($path . $file -> getClientOriginalName());	
		$farm->patent = $file -> getClientOriginalName();;
      	$farm->save(); 

      	return redirect() -> route('farm.index');
      	}
      	$patent='patent';	     

      	$default = Defoult::where('name', $patent) -> pluck('image');

      	$farm->patent = $default;
      	//dd($farm->patent);
      	
      	$farm->save();
      	return redirect() -> route('farm.index');
      

		/*
		$finca = new \App\Finca;
		$id_users= Auth::id(); 
		$finca->idUser = $id_users; 
		$finca->nombre = \Request::input('nombre');
		$finca->direcion = \Request::input('direcion');

		$finca->latitud = "120";
		$finca->longitud = "120";

		$finca->representante = \Request::input('representante');
		$finca->certficadoOperacion = \Request::input('certficadoOperacion');
		$finca->explotacion = \Request::input('explotacion');

		$file = array('image' => Input::file('image'));
		$destinationPath = 'img/fierro'; 
		$extension = Input::file('image')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName); 
		$finca->marca = $fileName;
      	$finca->save(); */






		
		/*
		$file = array('image' => Input::file('image'));
  // setting up rules
  		$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
  // doing the validation, passing post data, rules and the messages
  		$validator = Validator::make($file, $rules);
  		if ($validator->fails()) {
    // send back to the page with the input data and errors
    		return Redirect::to('finca')->withInput()->withErrors($validator);
  		}
  		else {
    // checking file is valid.
    	if (Input::file('image')->isValid()) {
    		  $destinationPath = 'img/fierro'; // upload path
      	$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
      	$fileName = rand(11111,99999).'.'.$extension; // renameing image
      	Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message

      	$finca->marca = $fileName;
      	$finca->save();
      	Session::flash('success', 'Upload successfully'); 
      	return redirect('finca/create')->with('message', 'Registro Guardado');
    	}
    	else {
      // sending back with error message.
      	Session::flash('error', 'uploaded file is not valid');
     return redirect('finca/create')->with('message', 'Error');




      	
    }
  }
  */
}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
