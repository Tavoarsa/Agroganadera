 <div class= "alert alert-danger " role=" alert">
     @if($errors->any())                                                    
        <p>Revisar los siguientes Campos</p>
                    
        @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach                                                
     @endif
</div>