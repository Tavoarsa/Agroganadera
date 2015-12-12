<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection as Collection;

use Illuminate\Http\Request;
use App\Animal;
use App\Disease;
use App\Vaccine;
use Input;
use App\VaccinationControl;
use Auth;
use App\Calendar;
use App\DB;

class VaccinationControlsController extends Controller {

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
		$diseases=Disease::all();		
		//dd($diseases);
		return view('vaccinationControls.index',compact('diseases'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$animal= Animal::all()->lists('nombre','id');
		
		$disease= Disease::all()->lists('name','id');
//dd($disease);
		$vaccine= Vaccine::all()->lists('name','id');
		//dd($vaccine);
		return view("vaccinationControls.runvaccine",compact('animal','disease','vaccine'));

	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($boosterI, 6, 4)."-".substr($boosterI, 3, 2)."-".substr($boosterI, 0, 2)." " .substr($boosterI, 10, 6)) * 10000);
//dd($request->diseaseName);
			$animalName=Animal::where('id',$request->animalName)->pluck('nombre');
			$diseaseName=Disease::where('id',$request->diseaseName)->pluck('name');
			$vaccineName=Vaccine::where('id',$request->vaccineName)->pluck('name');
			$vc= new VaccinationControl();
			$vc->idUser=Auth::id();
			$vc->animalName=$animalName;
		
			$vc->diseaseName=$diseaseName;
			$vc->vaccineName=$vaccineName;
			$vc->dateApplication=Input::get('dateApplication');
			
			$vc->dose=Input::get('dose');
			$vc->responsible=Input::get('responsible');
			$vc->boosterInjection=Input::get('boosterInjection');	
			//dd($vc);		
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
				return redirect() -> route('vaccinationControl.show');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$reports= VaccinationControl::all();
		return view('vaccinationControls.show',compact('reports'));

						
		/*				
						
		
		$dateApplication_Q=\DB::table('vaccination_controls')						
						->select('vaccination_controls.dateApplication')
						->get();
		$dateApplication=json_decode(json_encode($dateApplication_Q), true);	

		$dose_Q= \DB::table('vaccination_controls')						
						->select('vaccination_controls.dose')
						->get();
		$dose=json_decode(json_encode($dose_Q), true);

		$boosterInjection_Q= \DB::table('vaccination_controls')						
						->select('vaccination_controls.boosterInjection')
						->get();
		$boosterInjection=json_decode(json_encode($boosterInjection_Q), true);						
			
		$disease_Q=\DB::table('diseases')
						->join('vaccination_controls','idDisease','=','diseases.id')
						->select('diseases.name')
						->get();
		$disease=json_decode(json_encode($disease_Q), true);

		$animal_Q=\DB::table('animals')
						->join('vaccination_controls','idAnimal','=','animals.id')
						->select('animals.nombre')
						->get();
		$animal=json_decode(json_encode($animal_Q), true);					

		$vaccine_Q=\DB::table('vaccines')
						->join('vaccination_controls','idVaccine','=','vaccines.id')
						->select('vaccines.name')
						->get();
		$vaccine=json_decode(json_encode($vaccine_Q), true);

		//dd($dateApplication);
						
	
		$reports=collect(["dateApplication"=>$dateApplication_Q]);*/	

		//dd($reports);				
		
		

		
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
