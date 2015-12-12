@extends('app')

@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">  
                    <a href="{{ url('/farm/create') }}" class="btn btn-info" role="button">Nueva Finca</a>                  
                    <div class="panel-body">
                        <div class="row">
                            @foreach($farms as $farm)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                      
                                      <img src="/img/patent/{{$farm->patent}}" alt="{{$farm->name}}">
                                 
                                    <div class="caption">
                                        
                                        <h3 >{{$farm->name}}</h3>
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