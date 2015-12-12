@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/vaccine') }}" class="btn btn-info" role="button">Listado de Vacunas</a>

                        Editar Vacuna:  {{$vaccine->name }}
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        {!! Form::model($vaccine, ['route' => ['vaccine.update',$vaccine->id], 'method' => 'PUT', 'files' => 'true']) !!}
                            <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">   
                            @include('vaccines.partials.fields')
                            
                            <button type="submit" class="btn btn-default">Actualizar Vacuna</button>
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



