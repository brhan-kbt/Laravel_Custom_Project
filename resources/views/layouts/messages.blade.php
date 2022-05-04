@if (count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="container alert  alert-danger text-center">
        {{$error}}
    </div>
    @endforeach
@endif

@if (session('success'))
    <div class="container alert  alert-success text-center">
        {{session('success')}}
    </div>
@endif


@if (session('error'))
    <div class="container alert  alert-danger text-center">
        {{session('error')}}
    </div>
@endif