@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
                <a href="{{ url('/food__supplement') }}" class="btn btn-info" role="button">Alimento</a>
               
                <div class="panel-body">

                        <div class="row">
                            @foreach($food__supplements as $food__supplement)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                     <img src="/img/food__supplement/{{$food__supplement->image}}" alt="{{$food__supplement->nameProduct}}">
                                
                                    <div class="caption">
                                        <h3 >{{$food__supplement->nameProduct}}</h3>
                                        <h3>{{$food__supplement->price}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('food__supplements/edit', $food__supplement->id) }}">Editar</a> </p>

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

