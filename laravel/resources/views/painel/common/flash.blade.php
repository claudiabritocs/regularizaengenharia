@if(session('success'))
   <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {!! session('success') !!}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-block alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        @foreach($errors->all() as $error)
        {!! $error !!}<br>
        @endforeach
    </div>
@endif
