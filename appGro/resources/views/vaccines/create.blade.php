@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nueva Vacuna</div>
 
              include('partials.messages')
 
				<div class="panel-body">

					    {!! Form::open(['route' => 'vaccine.store', 'method' => 'POST', 'files' => 'true']) !!}
                        @include('vaccines.partials.fields')
                                                                             
                        <button type="submit" class="btn btn-default">Guardar Vacuna</button>
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