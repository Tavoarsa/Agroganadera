<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Input;
use Session;
use Redirect;
use App\Animal;
use App\Defoult;

class AnimalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{		
		$animals= Animal::where('idUser',Auth::id())->get();
		//dd($animals);
		return view('animals.index',compact('animals'));
	}

	public function create()
	{
		//Cosecutivo de numeroAnimal
		$numeroAnimal_Q= Animal::where('idUser',Auth::id())->max('numeroAnimal');//dd($numeroAnimal_Q);
		$numeroAnimal=$numeroAnimal_Q+ "1";
		//Retorno del nombre de padre y madre		
		$madre= \DB::table('animals')
                    ->where('genero','hembra')
                    ->Where('idUser',Auth::id())
                    ->lists('nombre','id');//dd($madre);
		$padre= \DB::table('animals')
                    ->where('genero','macho')
                    ->Where('idUser',Auth::id())
                    ->lists('nombre','id');
		$selected=array();
		
		//dd($madre);

		return view("animals.create",compact('madre','selected','padre','numeroAnimal'));
	}


	public function store(Request $request)
	{	
			$rules =array(


			'numeroAnimal'	 		 	=> 'required',	
			'nombre'  					=> 'required',
			//'idPadre'   				=> 'required|integer',			
			//'idMadre'       			=> 'required|integer',
			'raza'						=> 'required',
			'genero'					=> 'required',
			'fechaNacimiento'			=> 'required',
			'pesoNacimiento'			=> 'required|integer',
			//'fechaMuerte'				=> 'required',
			'observaciones'				=> 'required',
			//'image'					 	=> 'required|mimes:jpeg,bmp,png',		

			);



		$this->validate($request,$rules);
		$id_users= Auth::id();


		
		

			//Registramos el Peso del animal.
		//$weight= new Weight();
		//$weight->idUser=$id_users;

		 
		//$madre=$request->madre;

		//$padre=$request->padre;
		$animal = new Animal();	
		//Validamos si padre o madre son desconocido y asignamos nombre
		if(empty($request->madre) || empty($request->padre))
		{//dd("hola");
			$animal->idUser = $id_users;
			$animal->numeroAnimal=$request->numeroAnimal .''."arsa";
			$animal->nombre= "Desconocido";
			$animal->idMadre= "1000000";
			$animal->idPadre= "10000000";
			$animal->raza = $request->raza;
			$animal->genero= $request->genero;
			$animal->fechaNacimiento= $request->fechaNacimiento;
			$animal->pesoNacimiento= $request->pesoNacimiento;
			$animal->observaciones= $request->observaciones;

		}else
		{
			
			$animal->numeroAnimal=$request->numeroAnimal .''."arsa";
			$animal->nombre= $request->nombre;
			$animal->idMadre= $request->madre;
			$animal->idPadre= $request->padre;
			$animal->idUser = $id_users;
			$animal->raza = $request->raza;
			$animal->genero= $request->genero;
			$animal->fechaNacimiento= $request->fechaNacimiento;
			$animal->pesoNacimiento= $request->pesoNacimiento;
			$animal->observaciones= $request->observaciones;

		}
						

		if (Input::hasFile('image')) {
			//dd('hola');

		$file = Input::file('image');//Creamos una instancia de la libreria instalada
		$image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
		$path = 'img/animal/';			
			// Cambiar de tamaño
		$image -> resize(450, 450);
		$image -> save($path . $file -> getClientOriginalName());	
		$animal->image = $file -> getClientOriginalName();
		//dd($animal);

		
		
      	$animal->save(); 

      	return redirect() -> route('animal.index');
      	}

      	$image='animal';	     

      	$default = Defoult::where('name', $image) -> pluck('image');

      	$animal->image = $default;
      	//dd($farm->patent);
      	
      	$animal->save();
      	return redirect() -> route('animal.index');

	
		
		
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
	public function destroy($id = null)
	{
		chmod($this->folder.'/'.$id, 0777);

		if (unlink($this->folder.'/'.$id)) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Error al eliminar');
			Session::flash('class','danger');
		}

		return Redirect::to('/');
	}



}
