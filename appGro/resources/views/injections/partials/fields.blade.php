<div class="form-group">
    {!! form::label('name','Nombre')!!}
    {!! form::text('name',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('idProvider', 'Proveedor')!!}
    {!!Form::select('idProvider',$providers,["class" => "form-control"])!!}
</div>
<div class="form-group">
    {!! form::label('indications','Indicaciones')!!}
    {!! form::text('indications',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('Dosage','Posoligia')!!}
    {!! form::text('Dosage',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('composition','Composición')!!}
    {!! form::text('composition',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('application','Aplicaciones')!!}
    {!! form::text('application',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('precautions','Precauciones')!!}
    {!! form::text('precautions',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('effects','Efectos')!!}
    {!! form::text('effects',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('sizes','Tamaño')!!}
    {!! form::text('sizes',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('prices','Precio')!!}
    {!! form::text('prices',null,['class' => 'form-control']) !!}
</div>

{!!Form::label('due_date', 'Fecha Vencimiento')!!}
  <div class='input-group date' id='due_date'>
 {!! Form::input('text', 'due_date',null,['class'=>'form-control']) !!}
 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
 </div
 <div class="form-group">
    {!! form::label('image','Imagen')!!}   
    {!! form::file('image',null,['class' => 'form-control']) !!}
</div>
   			


