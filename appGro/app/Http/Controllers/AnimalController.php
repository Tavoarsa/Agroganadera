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
use App\Farm;
use App\Disease;
use App\Injection;
use App\Vaccine;
use App\Calendar;
use App\DB;
use App\Food_Supplement;
use App\DietaryControl;
use App\VaccinationControl;
use App\InjecctionControl;
use App\Weight;
use App\MilkProduction;


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
			$madre= \DB::table('animals')
	                    ->where('genero','hembra')
	                    ->Where('idUser',Auth::id())
	                    ->lists('nombre','id');//dd($madre);
			$padre= \DB::table('animals')
	                    ->where('genero','macho')
	                    ->Where('idUser',Auth::id())
	                    ->lists('nombre','id');
			$selected=array();

			return view("animals.create",compact('madre','selected','padre','numeroAnimal'));
	}

	public function store(Request $request)
	{	
				$rules =array(


				'numeroAnimal'	 		 	=> 'required',	
				'nombre'  					=> 'required',		
				'raza'						=> 'required',
				'genero'					=> 'required',
				'fechaNacimiento'			=> 'required',
				'pesoNacimiento'			=> 'required|integer',
				'observaciones'				=> 'required',			

				);
			$this->validate($request,$rules);
			$id_users= Auth::id();			
			$animal = new Animal();
			$farm= \DB::table('farms')->first();			
			//Validamos si padre o madre son desconocido y asignamos nombre
				if($request->madre == null && $request->padre ==null)
				{
					$animal->idMadre= "000";
					$animal->idPadre= "000";				

				}elseif($request->padre==null){
					
					$animal->idPadre= "000";
					$animal->idMadre=$request->madre;		
					
				}elseif($request->madre==null){
					$animal->idMadre='000';	
					$animal->idPadre= $request->padre;
				}else
				{
				$animal->idMadre=$request->madre;
				$animal->idPadre= $request->padre;	

				}	
					$animal->idUser = $id_users;
					$animal->numeroAnimal= $farm->name.''.$request->numeroAnimal;
					$animal->nombre= $request->nombre;			
					$animal->raza = $request->raza;
					$animal->genero= $request->genero;
					$animal->fechaNacimiento= $request->fechaNacimiento;
					$animal->pesoNacimiento= $request->pesoNacimiento;
					$animal->observaciones= $request->observaciones;
			//Validacion de imagen 
			if (Input::hasFile('image')) {		

			$file = Input::file('image');//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
			$path = 'img/animal/';			
				// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());	
			$animal->image = $file -> getClientOriginalName();
		  	$animal->save(); 

	      	return redirect() -> route('animal.index');
	      	}
	      	//Si no hay imagen, se guarda una por defecto
	      		$image='animal';	     

	      	$default = Defoult::where('name', $image) -> pluck('image');

	      	$animal->image = $default;
	      	//dd($farm->patent);
	      	
	      	$animal->save();
	      	return redirect() -> route('animal.index');

	
		
		
	}

	public function control_animal($id)
	{
			$animals= Animal::where('id',$id)->get();
			$nombre=\DB::table('animals')                    
	                    ->Where('id',$id)
	                    ->pluck('nombre');
	                    //dd($nombre);
			

			$genero= \DB::table('animals')                    
	                    ->Where('id',$id)
	                    ->lists('genero','nombre');
		//dd($animals);

			return view('animals.control_animal',compact('nombre','animals'));
	}

	public function registro_sanitario_vaccine($id)
	{
		
			$animals= Animal::where('id',$id)->lists('nombre','id');
			
			$disease= Disease::all()->lists('name','id');

			$vaccine= Vaccine::all()->lists('nameV','id');
		
			return view('animals.registro_sanitario_vaccine',compact('animals','disease','vaccine'));
	}

		public function ejecutar_vacunas(Request $request)
	{
		$rules =array(

			
			'dateApplication'			=> 'required',
			'boosterInjection'			=> 'required',
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($request,$rules);

		
			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Vaccine::where('id',$request->vaccineName)->pluck('price_ml');
			
			
			$vc= new VaccinationControl();
			$vc->idUser=Auth::id();
			$vc->animalName=$request->animalName;
		
			$vc->diseaseName=$request->animalName;
			$vc->vaccineName=$request->vaccineName;
			$vc->dateApplication=$request->dateApplication;
			
			$vc->dose= $request->dose;
			$vc->value=$request->dose*$price;
			$vc->responsible=$request->responsible;
			$vc->boosterInjection=$request->boosterInjection;	
				
			$vc->save();


			$event = new Calendar();
			$event ->idUser=Auth::id();
			$event ->title ='Vacunacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;			

			$event->save();
				
			return redirect() -> route('animal.index');


	}
	public function registro_sanitario_injection($id)
	{
		
			$animals= Animal::where('id',$id)->lists('nombre','id');
			
			$disease= Disease::all()->lists('name','id');

			$injection= Injection::all()->lists('name','id');
		
			return view('animals.registro_sanitario_injection',compact('animals','disease','injection'));
	}

	public function ejecutar_injection(Request $requestI)
	{		
			$rules =array(

			
			'dateApplication'			=> 'required',
			'boosterInjection'			=> 'required',
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($requestI,$rules);
		
			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Injection::where('id',$requestI->injectionName)->pluck('price_ml');

			
			$ic= new InjecctionControl();
			$ic->idUser=Auth::id();
			$ic->animalName=$requestI->animalName;
		
			$ic->diseaseName=$requestI->diseaseName;
			$ic->injectionName=$requestI->injectionName;
			$ic->dateApplication=$requestI->dateApplication;
			
			$ic->dose= $requestI->dose;
			$ic->value=$requestI->dose*$price;
			$ic->responsible=$requestI->responsible;
			$ic->boosterInjection=$requestI->boosterInjection;	
			$ic->save();

			$event = new Calendar();
			$event ->idUser=Auth::id();
			$event ->title ='Vacunacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;
			

			$event->save();
			return redirect() -> route('animal.index');


	}


	public function control_alimenticio($id)
	{
			
			$animals= Animal::where('id',$id)->lists('nombre','id');
			$food_supplements= Food_Supplement::where('idUser',Auth::id())->lists('nameProduct','id'); 		
			
			return view('animals.control_alimenticio',compact('animals','food_supplements'));
	}

	public function ejecutar_alimento(Request $request)
	{	
			$rules =array(

			
				
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($request,$rules);

			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Food_Supplement::where('id',$request->food_supplements)->pluck('price_kg');	 

			//$animalName=Animal::where('id',$request->animalName)->pluck('nombre');
			//$food_supplement=Food_Supplement::where('id',$request->food_supplements)->pluck('nameProduct');		

			$dc= new DietaryControl();
			$dc->idUser=Auth::id();
			$dc->idAnimal=$request->animalName;			
			$dc->idFood_Supplemet=$request->food_supplements;
			$dc->dateApplication=$request->dateApplication;		
			$dc->Dosage=$request->dose;
			$dc->value=$request->dose*$price;
			$dc->responsible=$request->responsible;					
			$dc->save();


			$event = new Calendar();
			$event ->idUser=Auth::id();
			$event ->title ='Alimentacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;
			

			$event->save();
				
			return redirect() -> route('animal.index');

	}

	public function peso($id){

			$animals= Animal::where('id',$id)
						->where('idUser',Auth::id())
						->lists('nombre','id'); 

			return view('animals.peso',compact('animals'));


	}

	public function ejecutar_peso(Request $request){

			$rules =array(

	
			'weight'				=> 'required|integer',
			'dateweight'			=> 'required',					

			);

			$this->validate($request,$rules);


			$weight= new Weight();
			$weight->idUser= Auth::id();
			$weight->idAnimal=$request->animalName;
			$weight->weight=$request->weight;
			$weight->dateWeight=$request->dateweight;
			$weight->save();
			return redirect()->route('animal.index');


	}

	public function redirect_milk_production($id){

			$mp= new MilkProduction();

			$mp->idUser= Auth::id();
			$mp->idAnimal=$id;
			$mp->save();
			$milk_productions= MilkProduction::where('milk_productions.idUser',Auth::id())
									 ->where('milk_productions.idAnimal',$id)
						      	     ->join('animals','animals.id','=','milk_productions.idAnimal')						      	     
						      	     ->select('animals.nombre','milk_productions.morning_production','later_production')
						  			 ->get();//dd($milk_productions);

			return view('animals.list_milk_production',compact('milk_productions'));
		


	}
	public function milk_production($id){
			
			$animals= Animal::where('idUser',Auth::id())->get();

			return view('animals.milk_production',compact('animals'));
	}



	
	





	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	

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
		
	}



}
