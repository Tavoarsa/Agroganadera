<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Provider;
use Auth;
use Input;
use App\Defoult;

class ProviderController extends Controller {


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
		$providers = Provider::where('idUser',Auth::id())-> get();
		return view("providers.index",compact('providers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('providers.store');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$provider = new Provider();
		$provider->idUser=Auth::id();
		$provider->name=Input::get('name');
		$provider->address=Input::get('address');
		$provider->email=Input::get('email');
		$provider->phone=Input::get('phone');
		$provider->service=Input::get('service');
		$provider->observation=Input::get('observation');
		$provider->save();		
		return redirect() -> route('provider.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
		
			if ($request -> name == "") {
			$providers = Defoult::where('name', 'no_found') -> get();
			return view('providers.show', compact('providers'));
		} else 
		{
			$providers = Provider::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();
			

			if (sizeof($providers) == 0) {

				
				$providers = Defoult::where('name', 'no_found') -> get();
				
				return view('providers.show', compact('providers'));				

			}			

			

				$providers = Provider::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();

				return view('providers.show', compact('providers'));	


			

			


		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$provider = Provider::findOrFail($id);
		
		return view('providers.edit', compact('provider'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$provider = Provider::findOrFail($id);
		
		$provider->name=Input::get('name');
		$provider->address=Input::get('address');
		$provider->email=Input::get('email');
		$provider->phone=Input::get('phone');
		$provider->service=Input::get('service');
		$provider->observation=Input::get('observation');
		$provider->save();		
		return redirect() -> route('provider.index');
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
