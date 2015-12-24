@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">


                <div class="panel-heading">
               <a href="{{ url('/vaccine') }}" class="btn btn-info" role="button">Listado de Vacunas</a>
       
                     {!!Form::open(['route'=>'vaccine.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}
                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Vacuna'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                </div>


                <div class="panel-body">

                        <div class="row">
                            @foreach($vaccines as $vaccine)

                            @if($vaccine->name==="no_found") 

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <a >
                                      <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">
                                  </a>
                                    
                                </div>
                            </div>
                                           

                           
                            @else

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">
                                
                                    <div class="caption">
                                        <h3 >{{$vaccine->nameV}}</h3>
                                        <h3>{{$vaccine->indications}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('vaccines/edit', $vaccine->id) }}">Editar</a> </p>

                                    </div>
                                </div>
                            </div>
                            
                             

                          
                            @endif


                           
                           

                         
                            

                            
                           
                            @endforeach                           
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

