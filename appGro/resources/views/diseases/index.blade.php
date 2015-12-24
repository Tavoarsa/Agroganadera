@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Enfermedades</div>
 
                @if($errors->any())
                <p>Corregir los siguientes erroress</p>
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif

 
				<div class="panel-body">



					{!! Form::open(['route' => 'disease.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 
							<div class="form-group">

								{!!Form::label('name', 'Nombre')!!}
								{!! Form::text('name', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('description', 'Descripción')!!}
								{!! Form::text('description', null, ["class" => "form-control"]) !!}
							</div>


							<div class="form-group">

								{!!Form::label('symptom', 'Sintoma')!!}
								{!! Form::text('symptom', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('vaccinationAge', 'Edad de Vacunación')!!}
								{!! Form::text('vaccinationAge', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('boosterInjection', 'Reevacunacion')!!}
								{!! Form::text('boosterInjection', null, ["class" => "form-control"]) !!}
							</div>

							
						
							
							<div class="form-group">
								{!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
							</div>
							 
 
					{!! Form::close() !!}



                            	<table class= "table">
                            		<thead>
                            			<tr>
                            				<th>Nombre</th>
                            				<th>Descripción</th>
                            				<th>Sintoma</th>
                            				<th>Edad De Vacunación</th>
                            				<th>Revacunación</th>
                            			</tr>
                            		</thead>
                            		<tbody>
                            			@foreach($diseases as $diseases)
                            			<tr>
                            				<td>{{$diseases->name }}</td>
                            				<td>{{$diseases->description }}</td>
                            				<td>{{$diseases->symptom }}</td>
                            				<td>{{$diseases->vaccinationAge }}mes</td>
                            				<td>{{$diseases->boosterInjection }}mes</td>

                            			</tr>
                            			@endforeach    
                            		</tbody>
                            		

                            	</table>
                           
				</div>


			</div>
		</div>
	</div>
</div>
@endsection