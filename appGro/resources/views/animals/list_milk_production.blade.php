@extends('app')

@section('content') 
    <div class="container">
     
        <div class="row">

            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                  
                    <div class="panel-heading">   
                                    
                    </div>
                   
                    <div class="panel-body">
                                             
                        <div class="table-responsive">   
                          <table class="table">
                            <thead>
                              <tr>
                                                             
                                <th>Nombre</th>
                                <th>Producion Mañana</th>
                                <th>Producion Tarte</th>
                                <th></th>
                               
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($milk_productions as $milk_production)        
                            <tr>              
                                                           
                                <td>{{$milk_production->nombre }}</td>               
                                <td>{{$milk_production->morning_production }}</td>           
                                <td>{{$milk_production->later_production }}</td >                               
                                <td><a class="btn mini blue-stripe" href="{{ url('animal/milk_production/ejecutar_milk_production', $milk_production->id) }}" >Generar</a></td>
                              
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