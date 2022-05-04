@extends('pradmin.dashboard')
@section('content')
<div class="container" >
@if (!count($posts)>0)
    <a href="{{action('ChurchProfileController@create')}}" class="btn btn-primary mb-4">Create Profile</a>
@endif

@foreach ($posts as $post )
    

         <h1>{{$post->churchName}}</h1>
        <div class="row">
            <img style="width:300px; height:300px"src="/storage/churchP_images/{{$post->photo}}" >
            <h1>Address: {{$post->address}}</h1>
            <h1>Email: {{$post->email}}</h1>
            <h1>Phone number:+251{{$post->phone}}</h1>
        </div>
            <p>{{$post->description}}</p>
            <small>created on{{$post->created_at}}</small>
        <hr>
@if(!Auth::guest())
<div style="display: flex;">
    <a href="church_profile/{{$post->id}}/edit" class="btn btn-primary">Update</a>
 </div>
    @endif

@endforeach
 </div>
 @endsection