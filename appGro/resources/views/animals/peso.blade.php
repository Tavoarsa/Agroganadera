@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Peso</div>
 
               @include('partials.messages')			
 
				<div class="panel-body">

					{!! Form::open(array('url'=>'animal/peso/ejecutar_peso','novalidate' =>'novalidate','method'=>'POST', 'files'=>true)) !!}              
                 
                             <div  class="form-group">
                                {!!Form::label('animalName', 'Animal')!!}
                                {!!Form::select('animalName',$animals,["class" => "form-control"])!!}
                            </div>                           

                            <div class="form-group">
                                {!!Form::label('weight', 'Peso')!!}
                                {!!Form::text('weight',null,["class" => "form-control"])!!}
                                
                            </div> 

                             <div class="form-group" >
                                {!!Form::label('dateweight', 'Fecha')!!}
                                {!!Form::text('dateweight',null,["class" => "form-control"])!!}                      
                                                                
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