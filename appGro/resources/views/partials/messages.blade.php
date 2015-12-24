@if($errors->has())
    <div class='alert alert-danger'>
        @foreach ($errors->all('<p>:message</p>') as $message)
            {!! $message !!}
        @endforeach
    </div>
@endif
@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
