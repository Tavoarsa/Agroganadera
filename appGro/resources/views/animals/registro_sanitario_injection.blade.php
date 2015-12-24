@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Aplicar Injecciones</div>
 
              @include('partials.messages')	

				 <div class="panel-body">				 

				 {!! Form::open(array('url'=>'animal/registro_sanitario/ejecutar_injection','method'=>'POST', 'files'=>true)) !!}				
				 
				 			<div  class="form-group">
								{!!Form::label('animalName', 'Animal')!!}
								{!!Form::select('animalName',$animals,["class" => "form-control"])!!}
							</div>

							

							<div class="form-group">
								{!!Form::label('diseaseName', 'Enfermedad')!!}
								{!!Form::select('diseaseName',$disease,["class" => "form-control"])!!}
								
							</div>
							<div class="form-group">
								{!!Form::label('injectionName', 'Injeccion')!!}
								{!!Form::select('injectionName',$injection,["class" => "form-control"])!!}
								
							</div>

                			<div class="form-group">
                				{!!Form::label('dateApplication', 'Fecha de aplicación')!!}
                    			<div class='input-group date' id='dateApplication'>
                       			<!-- <input type='text' name= 'from' class='form-control' readonly/>-->

                       			{!! Form::input('text', 'dateApplication',null,['class'=>'form-control']) !!}
                       			 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar "></span>
                    			</div>
               				 </div>

               				 {!!Form::label('boosterInjection', 'Fecha Proxima aplicación')!!}              				 	
                    			<div class='input-group date' id='boosterInjection'>
                       			<!-- <input type='text' name= 'from' class='form-control' readonly/>-->
                       			{!! Form::input('text', 'boosterInjection',null,['class'=>'form-control']) !!}
                       			 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar "></span>
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
								{!! Form::submit('Ejecutar Injección', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 							

 
					{!! Form::close() !!}


                    </div>
				 
                     

	
			</div>
		</div>
	</div>
 <script type="text/javascript">

           
                $('#boosterInjection').datetimepicker({
                     });

        </script>

    


</div>
@endsection