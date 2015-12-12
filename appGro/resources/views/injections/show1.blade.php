@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
                <a href="{{ url('/injection') }}" class="btn btn-info" role="button">Listado de Inyecciones</a>
               
                <div class="panel-body">

                        <div class="row">
                            @foreach($injections as $injection)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">
                                
                                    <div class="caption">
                                        <h3 >{{$injection->name}}</h3>
                                        <h3>{{$injection->descrition}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('injections/edit', $injection->id) }}">Editar</a> </p>

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

