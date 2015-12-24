@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nueva Alimento</div>
 
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

 
				<div class="panel-body">

					    {!! Form::open(['route' => 'food__supplement.store', 'method' => 'POST', 'files' => 'true']) !!}
                        @include('food__supplements.partials.fields')
                                                                             
                        <button type="submit" class="btn btn-default">Agregar</button>
                        {!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

           
                $('#due_date').datetimepicker({
                     });

 </script>
</div>
@endsection