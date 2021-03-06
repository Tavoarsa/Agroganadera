@extends('app')

@section('content')



 
    <div class="container">






        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">



                    <div class="panel-heading">               


     
                     <a href="{{ url('/provider/create') }}" class="btn btn-info" role="button">Nuevo Proveedor </a>      

       
                     {!!Form::open(['route'=>'provider.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Proveedor'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                            </div>
                   
                    <div class="panel-body">
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                               
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Servico que ofrece</th>
                                <th></th>
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($providers as $provider)        
                            <tr>              
                                <td>{{$provider->name }}</td>                             
                                <td>{{$provider->email }}</td>               
                                <td>{{$provider->phone }}</td>           
                                <td>{{$provider->service }}</td>
                                <td><a class="btn mini blue-stripe" href="{{ url('provider/edit', $provider->id) }}" >Editar</a></td>                                 
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection