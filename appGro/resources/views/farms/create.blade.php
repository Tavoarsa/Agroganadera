@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
 
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

				<div id="mapholder"></div>
			    <p id="geo"></p>

									

					<button onclick="getLocation()">Ubicacion Geografica</button>


					

					<script>
					var x = document.getElementById("geo");
					var l = document.getElementById

					function getLocation() {
					    if (navigator.geolocation) {
					        navigator.geolocation.getCurrentPosition(showPosition, showError);
					    } else {
					        x.innerHTML = "Geolocation is not supported by this browser.";
					    }
					}

					function showPosition(position) {

						x.innerHTML = "Latitude: " + position.coords.latitude + 
    								  "<br>Longitude: " + position.coords.longitude;

    					l.innerHTML= position.coords.latitude;
    								  
					    var latlon = position.coords.latitude + "," + position.coords.longitude;

					    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
					    +latlon+"&zoom=14&size=400x300&sensor=false";
					    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
					   

					    
					}

					function showError(error) {
					    switch(error.code) {
					        case error.PERMISSION_DENIED:
					            x.innerHTML = "User denied the request for Geolocation."
					            break;
					        case error.POSITION_UNAVAILABLE:
					            x.innerHTML = "Location information is unavailable."
					            break;
					        case error.TIMEOUT:
					            x.innerHTML = "The request to get user location timed out."
					            break;
					        case error.UNKNOWN_ERROR:
					            x.innerHTML = "An unknown error occurred."
					            break;
					    }
					}
					</script>
 
				<div class="panel-body">



					{!! Form::open(['route' => 'farm.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 
							<div class="form-group">

								{!!Form::label('name', 'Nombre')!!}
								{!! Form::text('name', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('address', 'Dirección')!!}
								{!! Form::text('address', null, ["class" => "form-control"]) !!}
							</div>


							<div class="form-group">

								{!!Form::label('agent', 'Representante')!!}
								{!! Form::text('agent', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('operationCertificate', 'Certificado Operacion')!!}
								{!! Form::text('operationCertificate', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('exploitation', 'Explotacion')!!}
								{!! Form::select('exploitation', array('carne' => 'Carne', 'leche' => 'Leche','doblePrposito' => 'Doble Proposito'), 'Leche')!!}
							</div>

							
							<div class="controls">
								{!!Form::label('patent', 'Fierro')!!}
         						 <input type="file" name="patent" required>   							
       						 </div>
 
							
							<div class="form-group">
								{!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
							</div>
							 
 
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection