@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
 
                 @include('partials.messages')

			
 
				<div class="panel-body">

					{!! Form::open(array('url'=>'animal/control_alimenticio/ejecutar_alimento','novalidate' =>'novalidate','method'=>'POST', 'files'=>true)) !!}              
                 
                            <div  class="form-group">
                                {!!Form::label('animalName', 'Animal')!!}
                                {!!Form::select('animalName',$animals,["class" => "form-control"])!!}
                            </div>

                            

                            <div class="form-group">
                                {!!Form::label('food_supplements', 'Alimento')!!}
                                {!!Form::select('food_supplements',$food_supplements,["class" => "form-control"])!!}
                                
                            </div>                          


                            {!!Form::label('dateApplication', 'Fecha')!!}
                             <div class='input-group date' id='dateApplication'>

                                <!-- {!! Form::input('text', 'dateApplication',null,['class'=>'form-control']) !!}-->
                                 <input type='date' name= 'to' class='form-control'>
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        
                               
                             </div>   
                              <div class="form-group">
                                {!!Form::label('dose', 'Dosis')!!}
                                {!! Form::text('dose', null,["class" => "form-control"]) !!}
                            </div>                         
                            

                            

                            <div class="form-group">
                                {!!Form::label('responsible', 'Responsable')!!}
                                {!! Form::text('responsible', null, ["class" => "form-control"]) !!}
                            </div>                  
                            
                            <div class="form-group">
                                {!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
                            </div>
                            

 
                    {!! Form::close() !!}

				</div>

	
			</div>
		</div>
	</div>


     <script type="text/javascript">

           
                $('#dateApplication').datetimepicker({
                     });

        </script>

@endsection