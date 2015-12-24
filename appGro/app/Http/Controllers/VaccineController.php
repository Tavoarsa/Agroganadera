<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Vaccine;
use App\Defoult;
use App\Provider;

use Auth;
	
	
use Input;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class VaccineController extends Controller {

	public function __construct() {
		$this -> middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$vaccines = Vaccine::where('idUser',Auth::id())-> get();
		return view('vaccines.index', compact('vaccines'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		$providers= Provider::all()->lists('name','id');
		return view('vaccines.create',compact('providers'));
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
			$path = 'img/vaccines/';
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			//Guardar imagen.
			//Guardamos nombre y nombreOriginal en la BD
			$vaccine = new Vaccine();
			$vaccine -> idUser = Auth::id();
		
			$vaccine -> idProvider = $request->idProvider;

			$vaccine -> nameV = Input::get('name');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');
			$vaccine-> size=Input::get('sizes');
			$vaccine-> price =Input::get('prices');
			
			$price_ml= $request->prices/$request->sizes;	
			
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');

			$vaccine -> image = $file -> getClientOriginalName();
			$vaccine -> save();

			return redirect() -> route('vaccine.index');

		}


			$default = Defoult::where('name', 'vaccine') -> pluck('image');

			$vaccine = new Vaccine();
			$vaccine -> idUser = Auth::id();
			$vaccine -> idProvider = $request->idProvider;

			$vaccine -> nameV = Input::get('name');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');

			$vaccine-> size=Input::get('sizes');
			$vaccine-> price=Input::get('prices');
			//dd($request->price);
			$price_ml= $request->prices/$request->sizes;		
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');

			$vaccine -> image = $default;
			$vaccine -> save();

			return redirect() -> route('vaccine.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request) {

			if ($request -> nameV == "") {

			$vaccines = Defoult::where('name', 'no_found') -> get();
			//pluck('name');
			
			//$vaccines = Vaccine::where('name', '$default') -> get();
			//dd($vaccines);

			return view('vaccines.show', compact('vaccines'));

		} else 
		{
			$vaccines = Vaccine::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();
			

			if (sizeof($vaccines) == 0) {

				
				$vaccines = Defoult::where('name', 'no_found') -> get();
				
				return view('vaccines.show', compact('vaccines'));				

			}			

			

				$vaccines = Vaccine::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();

				return view('vaccines.show1', compact('vaccines'));	


			

			


		}
	}

	public function show1($id) {

		$vaccines = Vaccine::where('id', $id) -> get();
		//dd($injections);
		return view('vaccines.show1', compact('vaccines'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$vaccine = Vaccine::findOrFail($id);
		$providers= Provider::all()->lists('name','id');
		return view('vaccines.edit', compact('vaccine','providers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$vaccine = Vaccine::findOrFail($id);
		if (Input::hasFile('image')) {

			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/vaccines/';
			;

			// Guardar Original
			//$image->save($path.$file->getClientOriginalName());
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			// Guardar
			//$image->save($path.'injec_'.$file->getClientOriginalName());

			//Guardamos nombre y nombreOriginal en la BD


			$vaccine -> nameV = Input::get('name');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');

			$vaccine-> size=Input::get('sizes');
			$vaccine-> price=Input::get('prices');
			//dd($request->price);
			$price_ml= $request->prices/$request->sizes;		
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');		
			$vaccine -> image = $file -> getClientOriginalName();
			$vaccine -> save();

			return redirect() -> route('vaccine.index');

		}

		$file = Vaccine::where('id', $id) -> pluck('image');
		

		$vaccine -> nameV = Input::get('name');
		$vaccine -> indications = Input::get('indications');
		$vaccine -> Dosage = Input::get('Dosage');
		$vaccine -> composition = Input::get('composition');
		$vaccine -> application = Input::get('application');
		$vaccine -> precautions = Input::get('precautions');
		$vaccine -> effects = Input::get('effects');
		$vaccine -> size=Input::get('sizes');
		$vaccine -> price=Input::get('prices');
		$price_ml = $request->prices/$request->sizes;
		$vaccine -> price_ml=$price_ml;
		$vaccine -> due_date=Input::get('due_date');	
		$vaccine -> image = $file;
		$vaccine -> save();

		return redirect() -> route('vaccine.index');

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
