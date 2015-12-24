@extends('app')

@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">  
                    <a href="{{ url('/animal/create') }}" class="btn btn-info" role="button">Nuevo Animal</a>                  
                    <div class="panel-body">
                        <div class="row">
                            @foreach($animals as $animal)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                <h3>{{$animal->nombre}}</h3>
                                      
                                       <a  href="{{url('animal/control_animal',$animal->id) }}">
                                            <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">
                                        </a> 
                                 
                                    <div class="caption">
                                    
                                        

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