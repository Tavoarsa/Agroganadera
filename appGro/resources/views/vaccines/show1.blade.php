@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
                <a href="{{ url('/vaccine') }}" class="btn btn-info" role="button">Listado de Vacunas</a>
               
                <div class="panel-body">

                        <div class="row">
                            @foreach($vaccines as $vaccine)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">
                                
                                    <div class="caption">
                                        <h3 >{{$vaccine->name}}</h3>
                                        <h3>{{$vaccine->indications}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('vaccine/edit', $vaccine->id) }}">Editar</a> </p>

                                    </div>
                                </div>
                            </div>
                            @endforeach                           
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

