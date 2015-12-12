<div class="form-group">
    {!! form::label('name','Nombre')!!}
    {!! form::text('name',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('descrition','Descripción')!!}
    {!! form::textarea('descrition',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('image','Imagen')!!}   
    {!! form::file('image',null,['class' => 'form-control']) !!}
</div>