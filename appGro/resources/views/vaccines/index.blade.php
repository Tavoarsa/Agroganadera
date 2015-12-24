@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">    
                        <a href="{{ url('/vaccine/create') }}" class="btn btn-info" role="button">Nueva Vacuna</a>      

                        {!!Form::open(['route'=>'vaccine.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                        <div class="form-group">
                        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Vacuna'])!!}
                        </div>
                        <button class= "btn btn-info" type="submit">Buscar</button> 

                        {!!Form::close()!!}
                    </div>
                </div>

                      
    <div class="panel-body">

        <div class="row">
            @foreach($vaccines as $vaccine)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">                                 
                            <div class="caption">
                                <a href="{{url('vaccine/show1', $vaccine->id) }}">
                                <h3 >{{$vaccine->nameV}}</h3>
                                </a>
                            </div>
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