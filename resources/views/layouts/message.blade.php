@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(Session::has('message'))
    <div class="alert alert-info">{{session('message')}}</div>
@endif
