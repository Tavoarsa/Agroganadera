@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/food__supplement') }}" class="btn btn-info" role="button">Alimento</a>

                       
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        
                        {!! Form::model($food__supplements, ['route' => ['food__supplement.update',$food__supplements->id], 'method' => 'PUT', 'files' => 'true']) !!}
                             <img src="/img/food__supplement/{{$food__supplements->image}}" alt="{{$food__supplements->nameProduct}}">   
                            @include('food__supplements.partials.fields')                            
                            <button type="submit" class="btn btn-default">Actualizar</button>
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



