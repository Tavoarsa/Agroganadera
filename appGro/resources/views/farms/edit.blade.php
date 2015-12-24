@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    @if($errors->any())
                <p>Corregir los siguientes erroress</p>
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif                      

                    
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        {!! Form::model($farm, ['route' => ['farm.update',$farm->id], 'method' => 'PUT', 'files' => 'true']) !!}
                            <img src="/img/patent/{{$farm->patent}}" alt="{{$farm->name}}"> 

                            <div class="form-group">

                                {!!Form::label('name', 'Nombre')!!}
                                {!! Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('address', 'Dirección')!!}
                                {!! Form::text('address', null, ["class" => "form-control"]) !!}
                            </div>


                            <div class="form-group">

                                {!!Form::label('agent', 'Representante')!!}
                                {!! Form::text('agent', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('operationCertificate', 'Certificado Operacion')!!}
                                {!! Form::text('operationCertificate', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('exploitation', 'Explotacion')!!}
                                {!! Form::select('exploitation', array('carne' => 'Carne', 'leche' => 'Leche','doblePrposito' => 'Doble Proposito'), 'Leche')!!}
                            </div>

                            
                           <div class="form-group">
                                {!! form::label('patent','Imagen')!!}   
                                 {!! form::file('patent',null,['class' => 'form-control']) !!}
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Actualizar Finca</button>
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
