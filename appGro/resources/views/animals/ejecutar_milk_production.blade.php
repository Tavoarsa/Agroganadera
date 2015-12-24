@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Peso</div>
               
                 @include('partials.messages')		
 
				<div class="panel-body">               

					{!! Form::model($milk_productions,['route'=>['milk_productions.update',$milk_productions->id],'method' => 'PUT', 'files'=>true]) !!}              
                 
                             <div  class="form-group">
                                {!!Form::label('animalName', 'Animal')!!}
                                {!!Form::select('animalName',$milk_productions,["class" => "form-control"])!!}
                            </div>

                            

                            <div class="form-group">
                                {!!Form::label('morning_production', 'Producion Mañana')!!}
                                {!!Form::text('morning_production',null,["class" => "form-control"])!!}
                                
                            </div>                          


                            
                             <div class="form-group" >
                                {!!Form::label('later_production', 'Produccion Tarde')!!}
                                {!!Form::text('later_production',null,["class" => "form-control"])!!}                      
                                 
                               
                             </div> 

                              <div class="form-group" >
                                {!!Form::label('price_production', 'Precio Por litro')!!}
                                {!!Form::text('price_production',null,["class" => "form-control"])!!}                      
                                 
                               
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