<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Food_Supplement;
use App\Defoult;
use Auth;	
use Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class food__supplementsController extends Controller {

	public function __construct() {
		$this -> middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$food__supplements = Food_Supplement::where('idUser',Auth::id())-> get();
		return view('food__supplements.index', compact('food__supplements'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$providers= Provider::all()->lists('name','id');
		return view('food__supplements.create',compact('providers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/food__supplement/';		
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			//Guardar imagen.
			//Guardamos nombre y nombreOriginal en la BD
			$food__supplement = new Food_Supplement();
			$food__supplement -> idUser = Auth::id();
			$food__supplement -> idProvider = $request->idProvider;

			$food__supplement -> nameProduct = Input::get('nameProduct');
			$food__supplement -> weight = Input::get('weight');
			$food__supplement -> price = Input::get('price');
			$price_kg= $request->price/$request->weight;
			$food__supplement -> price_kg=$price_kg; 				
			$food__supplement -> due_date = Input::get('due_date');	
			$food__supplement -> image = $file -> getClientOriginalName();
			$food__supplement -> save();

			return redirect() -> route('food__supplement.index');

		}


			$default = Defoult::where('name', 'food__supplement') -> pluck('image');

			$food__supplement = new Food_Supplement();
			$food__supplement -> idUser = Auth::id();
			$food__supplement -> idProvider = $request->idProvider;

			$food__supplement = new Food_Supplement();
			$food__supplement -> idUser = Auth::id();
			$food__supplement -> idProvider = $request->idProvider;

			$food__supplement -> nameProduct = Input::get('nameProduct');
			$food__supplement -> weight = Input::get('weight');
			$food__supplement -> price = Input::get('price');
			$price_kg= $request->price/$request->weight;
			$food__supplement ->price_kg=$price_kg; 
			$food__supplement -> due_date = Input::get('due_date');	

			$food__supplement -> image = $default;
			$food__supplement -> save();

			return redirect() -> route('food__supplement.index');

	}

	/**
	 * Busca por nombre.
	 *
	 * @param  Request  $request
	 * @return 
	 */
	public function show(Request $request)
	{
		
		
		if ($request->nameProduct == "") 
		{
			$food__supplements =  Defoult::where('name', 'no_found') -> get();
			return view('food__supplements.show', compact('food__supplements'));
		} else 
		{
			$food__supplements = Food_Supplement::where('nameProduct', 'ILIKE', '%' . trim($request -> get(trim('nameProduct'))) . '%') -> get();

			if (sizeof($food__supplements) == 0) {				
				$food__supplements =  Defoult::where('name', 'no_found') -> get();
				
				return view('food__supplements.show', compact('food__supplements'));				
			}						

			$food__supplements = Food_Supplement::where('nameProduct', 'ILIKE', '%' . trim($request -> get(trim('nameProduct'))) . '%') -> get();
			return view('food__supplements.show1', compact('food__supplements'));	
		}
	}

	public function show1($id) {

		$food__supplements = Food_Supplement::where('id', $id) -> get();		
		return view('food__supplements.show1', compact('food__supplements'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		$food__supplements = Food_Supplement::findOrFail($id);
		$providers= Provider::all()->lists('name','id');
		return view('food__supplements.edit', compact('food__supplements','providers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$food__supplement = Food_Supplement::findOrFail($id);

		if (Input::hasFile('image')) {

			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/food__supplement/';		
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			//Guardar imagen.
			//Guardamos nombre y nombreOriginal en la BD
			
			$food__supplement -> idProvider = $request->idProvider;
			$food__supplement -> nameProduct = Input::get('nameProduct');
			$food__supplement -> weight = Input::get('weight');
			$food__supplement -> price = Input::get('price');
			$price_kg= $request-> price/$request->weight;
			$food__supplement -> price_kg=$price_kg; 				
			$food__supplement -> due_date = Input::get('due_date');	
			$food__supplement -> image = $file -> getClientOriginalName();
			$food__supplement -> save();

			return redirect() -> route('food__supplement.index');

		}

			$food__supplement -> idProvider = $request->idProvider;		
				
			$food__supplement -> nameProduct = $request->nameProduct;
			$food__supplement -> weight =$request->weight;
			$food__supplement -> price = $request->price;
			
			

			$price_kg= $request->weight/$request->price;
			
			$food__supplement -> price_kg=$price_kg; 
			$food__supplement -> due_date = Input::get('due_date');	

			
			$food__supplement -> save();

			return redirect() -> route('food__supplement.index');

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
