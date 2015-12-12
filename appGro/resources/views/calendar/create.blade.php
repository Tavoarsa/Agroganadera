@extends('app')

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="">Calendario</a></li>
        <li><a href="">Añadir evento</a></li>
    </ol>
    <div class="row">
    <h1 class="text-center heading">Añadir un nuevo evento</h1><hr>

    {!! Form::open(['route' => 'calendar.store', 'method' => 'POST', 'files' => 'true']) !!}




        <div class="col-sm-8 col-sm-offset-2" style="height:75px;">
           <div class='col-md-6'>
                <div class="form-group">
                    <div class='input-group date' id='from'>
                       <!-- <input type='text' name= 'from' class='form-control' readonly/>-->
                        {!! Form::input('text', 'from',null,['class'=>'form-control']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar "></span>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <div class='input-group date' id='to'>
                        {!! Form::input('text', 'to',null,['class'=>'form-control']) !!}
                       <!-- <input type='date' name= 'to' class='form-control' readonly>-->
                        
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-sm-12 control-label">Enlace al evento</label>
                <div class="col-sm-12">
                  <input type="url" name="url" class="form-control" id="url" placeholder="Introduce una url o no :)">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12 control-label">Tipo de evento</label>
                <div class="col-sm-12">
                    <select class="form-control" name="class">
                        <option value="event-info">Info</option>
                        <option value="event-success">Success</option>
                        <option value="event-inverse">Inverse</option>
                        <option value="event-important">Important</option>
                        <option value="event-warning">Warning</option>
                        <option value="event-special">Special</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-12 control-label">Título</label>
                <div class="col-sm-12">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Introduce un título">
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-12 control-label">Evento</label>
                <div class="col-sm-12">
                  <textarea id="body" name="event" class="form-control" rows="3"></textarea>
                </div>
            </div>

             <input style="margin-top: 10px" type="submit" class="pull-right btn btn-success" value="Gurdar evento">
            </div>
        </div>

  {!! Form::close() !!}
    </div>

     <script type="text/javascript">

           
                $('#to').datetimepicker({
                    

                 });
                 $('#from').datetimepicker({

                 });

        </script>
</div>




@endsection