@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">


                <div class="panel-heading">
               <a href="{{ url('/food__supplement') }}" class="btn btn-info" role="button">Alimento</a>
       
                     {!!Form::open(['route'=>'food__supplement.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}
                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Alimento'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                </div>


                <div class="panel-body">

                        <div class="row">
                            @foreach($food__supplements as $food__supplement)

                            @if($food__supplement->name==="no_found") 

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <a >
                                      <img src="/img/food__supplement/{{$food__supplement->image}}" alt="{{$food__supplement->nameProduct}}">   
                                  </a>
                                    
                                </div>
                            </div>
                                           

                           
                            @else

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/img/food__supplement/{{$food__supplement->image}}" alt="{{$food__supplement->nameProduct}}">   
                                
                                    <div class="caption">
                                        <h3 >{{$food__supplement->nameProduct}}</h3>
                                        <h3>{{$food__supplement->price}}</h3>
                                        <p><a class="btn btn-primary" href="{{url('vaccines/edit', $food__supplement->id) }}">Editar</a> </p>

                                    </div>
                                </div>
                            </div>
                            
                             

                          
                            @endif


                           
                           

                         
                            

                            
                           
                            @endforeach                           
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

