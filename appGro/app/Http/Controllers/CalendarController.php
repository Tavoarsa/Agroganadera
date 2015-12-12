<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Calendar;
use Input;
use Auth;

class CalendarController extends Controller {

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
		return view('calendar.calendar');
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    return view('calendar.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			$id_users= Auth::id(); 	
			$start=	Input::get('from');
			
			$startf=date(microtime(substr($start, 6, 4)."-".substr($start, 3, 2)."-".substr($start, 0, 2)." " .substr($start, 10, 6)) * 10000);
			
			
			$end=Input::get('to');
			$endf=date(microtime(substr($end, 6, 4)."-".substr($end, 3, 2)."-".substr($end, 0, 2)." " .substr($end, 10, 6)) * 10000);
			//dd($endf);

			$event = new Calendar();
			$event ->idUser= $id_users;
			$event ->title = Input::get('title');
			$event ->body = Input::get('event'); 
			$event ->url = Input::get('url');
			$event ->class = Input::get('class');
			$event ->start = $startf;
			$event ->end = $endf;
			//dd($event);

			$event->save();
			

		return redirect() -> route('calendar.index');


	
		/*$this->form_validation->set_rules('from', 'Desde', 'trim|required|xss_clean');
        $this->form_validation->set_rules('to', 'Hasta', 'trim|required|xss_clean');
		$this->form_validation->set_rules('url', 'Url', 'trim|required|xss_clean');
        $this->form_validation->set_rules('title', 'Título', 'trim|required|xss_clean');
        $this->form_validation->set_rules('event', 'Evento', 'trim|required|xss_clean');
        $this->form_validation->set_rules('class', 'Tipo de evento', 'trim|required|xss_clean');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
        	$this->load->model("events_model");
        	$this->events_model->add();
        	redirect("calendar");
        }*/
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$events= Calendar::all();
		$events=json_encode(
			array(
				"success"=>1,
				"result"=>$events)

			);
		//dd($events);
		
		return view('calendar.calendar', compact('events'));

		
	}

	
	public function render($id = 0)
	{
		if($id != 0)
		{
			echo $id;
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
