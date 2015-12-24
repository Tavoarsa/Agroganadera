<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateInjectionRequest;
use App\Http\Controllers\Controller;

use App\Injection;
use App\Defoult;
use App\Provider;
use Input;

use Auth;

use Illuminate\Http\Request;
//inyeccion de dependencias

class InjecctionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index() {

		$injections = Injection::where('idUser',Auth::id())-> get();

		return view('injections.index', compact('injections'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$providers= Provider::all()->lists('name','id');
		return view('injections.create',compact('providers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {

		if (Input::hasFile('image')) {
			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/injections/';
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			//Guardar imagen.
			//Guardamos nombre y nombreOriginal en la BD
			$injection = new Injection();
			$injection -> idUser = Auth::id();
			$injection -> idProvider = $request->idProvider;
			$injection -> name = Input::get('name');
			$injection -> indications = Input::get('indications');
			$injection -> Dosage = Input::get('Dosage');
			$injection -> composition = Input::get('composition');
			$injection -> application = Input::get('application');
			$injection -> precautions = Input::get('precautions');
			$injection -> effects = Input::get('effects');

			$injection-> size=Input::get('sizes');
			$injection-> price =Input::get('prices');
			
			$price_ml= $request->prices/$request->sizes;	
			
			$injection-> price_ml=$price_ml;
			$injection-> due_date=Input::get('due_date');

			$injection -> image = $file -> getClientOriginalName();
			$injection -> save();

			return redirect() -> route('injection.index');

		}


		$default = Defoult::where('name', 'injection') -> pluck('image');

		$injection = new Injection();
		$injection -> idUser = Auth::id();
		$injection -> idProvider = $request->idProvider;
		$injection -> name = Input::get('name');
		$injection -> indications = Input::get('indications');
		$injection -> Dosage = Input::get('Dosage');
		$injection -> composition = Input::get('composition');
		$injection -> application = Input::get('application');
		$injection -> precautions = Input::get('precautions');
		$injection -> effects = Input::get('effects');

		$injection-> size=Input::get('sizes');
		$injection-> price =Input::get('prices');
			
		$price_ml= $request->prices/$request->sizes;	
			
		$injection-> price_ml=$price_ml;
		$injection-> due_date=Input::get('due_date');
		$injection -> image = $default;
		$injection -> save();

		return redirect() -> route('injection.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request) {

		
		if ($request -> name == "") {

			$injections =  Defoult::where('name', 'no_found') -> get();
			return view('injections.show', compact('injections'));

		} else 
		{
			$injections = Injection::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();
			

			if (sizeof($injections) == 0) {

				
				$injections =  Defoult::where('name', 'no_found') -> get();
				//dd($injections);

				return view('injections.show', compact('injections'));				

			}			

			

				$injections = Injection::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();

				return view('injections.show1', compact('injections'));	


			

			


		}
		

		
	}

	public function show1($id) {
		$injections = Injection::where('id', $id) -> get();
		//dd($injections);
		return view('injections.show1', compact('injections'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		
		$injection = Injection::findOrFail($id);
		$providers= Provider::all()->lists('name','id');
		return view('injections.edit', compact('injection','providers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$injection = Injection::findOrFail($id);
		if (Input::hasFile('image')) {

			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/injections/';
			;

			// Guardar Original
			//$image->save($path.$file->getClientOriginalName());
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			// Guardar
			//$image->save($path.'injec_'.$file->getClientOriginalName());

			//Guardamos nombre y nombreOriginal en la BD
			$injection -> name = Input::get('name');
			$injection -> indications = Input::get('indications');
			$injection -> Dosage = Input::get('Dosage');
			$injection -> composition = Input::get('composition');
			$injection -> application = Input::get('application');
			$injection -> precautions = Input::get('precautions');
			$injection -> effects = Input::get('effects');

			$injection-> size=Input::get('sizes');
			$injection-> price=Input::get('prices');
			//dd($request->price);
			$price_ml= $request->prices/$request->sizes;		
			$injection-> price_ml=$price_ml;
			$injection-> due_date=Input::get('due_date');		
			$injection -> image = $file -> getClientOriginalName();
			$injection -> save();			
			return redirect() -> route('injection.index');

		}

		$file = Injection::where('id', $id) -> pluck('image');

	
		$injection -> name = Input::get('name');
		$injection -> indications = Input::get('indications');
		$injection -> Dosage = Input::get('Dosage');
		$injection -> composition = Input::get('composition');
		$injection -> application = Input::get('application');
		$injection -> precautions = Input::get('precautions');
		$injection -> effects = Input::get('effects');
		$injection -> size=Input::get('sizes');
		$injection -> price=Input::get('prices');
		$price_ml = $request->prices/$request->sizes;
		$injection -> price_ml=$price_ml;
		$injection -> due_date=Input::get('due_date');	
		$injection -> image = $file;
		$injection -> save();

		return redirect() -> route('injection.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
