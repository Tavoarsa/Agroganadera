@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">    
                        <button class= "btn btn-info" data-toggle="modal" data-target="#nuevo" >Nuevo Vacuna</button>       

                        {!!Form::open(['route'=>'vaccine.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                        <div class="form-group">
                        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Vacuna'])!!}
                        </div>
                        <button class= "btn btn-info" type="submit">Buscar</button> 

                        {!!Form::close()!!}
                    </div>
<!--.........................................................................................................................-->
                   
                                     
     

    <div class="modal fade" id="nuevo" tabindex= "-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiis="modal" aria-hidden="true">&times;</button>
                    <h4>Nueva Vacuna</h4>

                </div>
                    <div class="modal-body">
                      <!--@include('partials.messages')-->                                             
                        {!! Form::open(['route' => 'vaccine.store', 'method' => 'POST', 'files' => 'true']) !!}
                        @include('vaccines.partials.fields')                                                        
                        <button type="submit" class="btn btn-default">Guardar Vacuna</button>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>    
    </div>
 <!--.........................................................................................................................-->
                      
    <div class="panel-body">

        <div class="row">
            @foreach($vaccines as $vaccine)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/img/vaccines/{{$vaccine->image}}" alt="{{$vaccine->name}}">                                 
                            <div class="caption">
                                <a href="{{url('vaccine/show1', $vaccine->id) }}">
                                <h3 >{{$vaccine->name}}</h3>
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