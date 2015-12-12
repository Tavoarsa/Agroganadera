@extends('app')
@section('content')
 


 <div class= 'container'>

    <button class= "btn btn-info" data-toggle="modal" data-target="#nuevo" >Nuevo Animal</button>
    <div class="modal fade" id="nuevo" tabindex= "-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

             <div class="modal-header">
                <button type="button" class="close" data-dismiis="modal" aria-hidden="true">&times;</button>
                <h4>Nuevo Animal</h4>

             </div>
             <div class="modal-body">
                <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
                 <input name="_token" hidden value="{!! csrf_token() !!}" />
                <input type="file" name="filefield">
                <input type="submit">

        
    </form>



             </div>

        </div>



    </div>
    
 </div>

</div>

<h1> Pictures list</h1>
 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div>
@endsection