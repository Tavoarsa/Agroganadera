<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Animal;
use App\VaccinationControl;
use App\InjecctionControl;
use Auth;

class ReportController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{		
		$animals= Animal::where('idUser',Auth::id())->get();

		
		return view('reports.index',compact('animals'));
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$animals= Animal::where('idUser',Auth::id())
						->where('id',$request->id)
						->get();
						  	
		$vaccines= VaccinationControl::where('vaccination_controls.idUser',Auth::id())
									 ->where('vaccination_controls.animalName',$request->id)
						      	     ->join('vaccines','vaccines.id','=','vaccination_controls.vaccineName')
						      	     ->join('diseases','diseases.id','=','vaccination_controls.diseaseName')
						      	     ->select('vaccines.nameV','diseases.name','vaccination_controls.dateApplication','vaccination_controls.dose')
						  			 ->get();

		$injecctions= InjecctionControl::where('injecction_controls.idUser',Auth::id())
									 ->where('injecction_controls.animalName',$request->id)
						      	     ->join('injections','injections.id','=','injecction_controls.injectionName')
						      	     ->join('diseases','diseases.id','=','injecction_controls.diseaseName')
						      	     ->select('injections.name','diseases.name','injecction_controls.dateApplication','injecction_controls.dose')
						  			 ->get();
        $animal= Animal::where('id',$request->id)->get();
		
        return  view('reports.show',compact('animals','vaccines','injecctions','animal'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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
