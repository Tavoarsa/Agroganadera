@extends('app')


@section('content')

<div id="pdf" class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
        <script>
         

          function genPDF() {

            var doc = new jsPDF();
            doc.fromHTML($('#pdf').get(0),20,20,{
                  'width':500 });
            doc.save('report.pdf');
                         

              
          }

    
          </script>




                <div class="panel-heading">
                 <button onclick="genPDF()">Generar Reporte</button>              
                </div>


                <div class="panel-body">

                    <div class="row">
                      <div>
                        <div class="table-responsive">
                         <div >
                        <h3>Datos Animal</h3>
                        @foreach($animals as $animal)  
                         <div class="col-sm-6 col-md-4" >
                                <div class="thumbnail">
                                  <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">
                                   <h3>{{$animal->nombre}}</h3>                            
                                </div>
                            </div>
                            @endforeach 
                        </div> 
                                              
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Numero</th>                               
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Raza</th>
                                <th>Peso</th>
                                <th>Fecha Nacimiento</th>                                              
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($animals as $animal)        
                            <tr>              
                                <td>{{$animal->numeroAnimal }}</td>                             
                                <td>{{$animal->nombre }}</td>               
                                <td>{{$animal->genero }}</td>           
                                <td>{{$animal->raza }}</td>
                                <td>{{$animal->pesoNacimiento }}kg</td>
                                <td>{{$animal->fechaNacimiento }}</td>
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>  
                      </div>
                      <div>
                          <div class="table-responsive"> 
                          <h3>Vacunas Aplicadas</h3>                   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                               
                                <th>Enfermedad</th>
                                <th>Dosis</th>
                                <th>Fecha Aplicada</th>
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($vaccines as $vaccine)        
                            <tr>              
                                <td>{{$vaccine->nameV}}</td>                             
                                <td>{{$vaccine->name}}</td>               
                                <td>{{$vaccine->dose }}ml</td>           
                                <td>{{$vaccine->dateApplication }}</td>
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
                      </div>
                       <div>
                          <div class="table-responsive">
                          <h3>Injecciones Aplicadas</h3>          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                               
                                <th>Enfermedad</th>
                                <th>Dosis</th>
                                <th>Fecha Aplicada</th>
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($injecctions as $injecction)        
                            <tr>              
                                <td>{{$injecction->name}}</td>                             
                                <td>{{$injecction->name}}</td>               
                                <td>{{$injecction->dose }}ml</td>           
                                <td>{{$injecction->dateApplication }}</td>
                                
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
</div>
@endsection

