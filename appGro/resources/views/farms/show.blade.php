@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
                <a href="{{ url('/vaccine') }}" class="btn btn-info" role="button">Fincas</a>
               
                <div class="panel-body">

                        <div class="row">
                            @foreach($farms as $farm)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/img/patent/{{$farm->patent}}" alt="{{$farm->name}}"> 
                                
                                    <div class="caption">
                                        <h3 >{{$farm->name}}</h3>
                                        <h3>{{$farm->exploitation}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('farm/edit', $farm->id) }}">Editar</a> </p>

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

