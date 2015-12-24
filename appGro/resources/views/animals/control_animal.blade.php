@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Control Animal: {{$nombre}}</div>     

				
 
				<div class="panel-body" >


				 <div class="row">
                            @foreach($animals as $animal)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/registro_sanitario/vaccine',$animal->id) }}">
                                    	<img src="/img/RegistroSanitario.jpeg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Vacunas</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                 <div class="thumbnail">
                                    <a href="{{url('animal/registro_sanitario/injection',$animal->id) }}">
                                        <img src="/img/RegistroSanitario.jpeg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Inyecciones</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/control_alimenticio',$animal->id) }}">
                                    	<img src="/img/alimentos.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Alimentos</H4>                
                                </div>
                            </div>

                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/peso',$animal->id) }}">
                                        <img src="/img/alimentos.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Peso</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/milk_production',$animal->id) }}">
                                        <img src="/img/alimentos.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Produción</H4>                
                                </div>
                            </div>
                            
                            @endforeach
                                                   
                        </div>
				               

				</div>

				 
				 
                     

	
			</div>
		</div>
	</div>


    
</div>
@endsection