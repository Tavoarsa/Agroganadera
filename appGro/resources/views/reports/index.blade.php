@extends('app')

@section('content') 
    <div class="container">
     
        <div class="row">

            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                  
                    <div class="panel-heading">   
                                    
                    </div>
                   
                    <div class="panel-body">
                      <div class="row">
                       {!!Form::open(['route'=>'report.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                         <div class="form-group">
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Animal'])!!}                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                        {!!Form::close()!!}            


                      </div>
                       
                        <div class="table-responsive">   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Numero</th>                               
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Raza</th>
                                <th></th>
                                <th></th>
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($animals as $animal)        
                            <tr>              
                                <td>{{$animal->numeroAnimal }}</td>                             
                                <td>{{$animal->nombre }}</td>               
                                <td>{{$animal->genero }}</td>           
                                <td>{{$animal->raza }}</td>
                                <td><a class="btn mini blue-stripe" href="{{ url('report/create', $animal->id) }}" >Generar</a></td>
                              
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