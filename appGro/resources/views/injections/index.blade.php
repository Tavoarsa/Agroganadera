@extends('app')

@section('content')



 
    <div class="container">






        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">



                    <div class="panel-heading">               


     
                     <a href="{{ url('/injection/create') }}" class="btn btn-info" role="button">Nueva Inyecion</a>      

       
                     {!!Form::open(['route'=>'injection.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Inyección'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                            </div>
                   
                    <div class="panel-body">

                        <div class="row">
                            @foreach($injections as $injection)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                      
                                      <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">
                                 
                                    <div class="caption">
                                        <a href="{{url('injection/show1', $injection->id) }}">
                                        <h3 >{{$injection->name}}</h3>
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