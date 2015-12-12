@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/injection') }}" class="btn btn-info" role="button">Listado de Inyecciones</a>

                        Editar Inyección:  {{$injection->name }}
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        {!! Form::model($injection, ['route' => ['injection.update',$injection->id], 'method' => 'PUT', 'files' => 'true']) !!}
                            <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">   
                            @include('injections.partials.fields')
                            
                            <button type="submit" class="btn btn-default">Actualizar Inyeccion</button>
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection





                  



                    
     
     