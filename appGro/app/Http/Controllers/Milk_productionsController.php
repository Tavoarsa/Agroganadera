<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Milk_productionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =array(

	
			'morning_production'		=> 'integer',
			'later_production'			=> 'integer',
			'morning_production'		=> 'integer',
			'price_production'			=> 'required|integer',					

			);
		$this->validate($request,$rules);
		
		$m_p = MilkProduction::findOrFail($id);


		$m_p->morning_production=$request->morning_production;
		$m_p->later_production=$request->later_production;
		$m_p->total_production=$request->morning_production+$request->later_production;
		$m_p->price_production=(($request->morning_production+$request->later_production)*$request->price_production);	

		$mp->save();
		$animals= Animal::where('idUser',Auth::id())->get();//dd($animals);

		return view('animals.milk_production',compact('animals'));
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
		$milk_productions= MilkProduction::findOrFail($id);
		return view('animals.redirect_milk_production', compact('milk_productions'));
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
