@extends('app')

@section('content')



 
    <div class="container">






        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">



                    <div class="panel-heading">               


     
                    <button class= "btn btn-info" data-toggle="modal" data-target="#nuevo" >Nuevo Inyección</button>

       
                     {!!Form::open(['route'=>'injection.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Inyección'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                            </div>





                   <!--.........................................................................................................................-->
                   
                    



                    
     <!--.........................................................................................................................-->                   

                    <div class="modal fade" id="nuevo" tabindex= "-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                         <div class="modal-content">

                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiis="modal" aria-hidden="true">&times;</button>
                                                <h4>Nueva Inyección</h4>

                                             </div>
                                             <div class="modal-body">

                                               <!--@include('partials.messages')-->                                             

                    
                                             {!! Form::open(['route' => 'injection.store', 'method' => 'POST', 'files' => 'true']) !!}
                                                @include('injections.partials.fields')                                                        
                                                <button type="submit" class="btn btn-default">Guardar Inyección</button>
                                            {!! Form::close() !!}
                                             </div>
                                        </div>
                             </div>    
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