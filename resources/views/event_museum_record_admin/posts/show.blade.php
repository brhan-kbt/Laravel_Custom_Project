@extends('pradmin.dashboard')
@section('content')
<a href="/posts" class="btn btn-primary">Go back</a>
<h1>{{$posts->title}}</h1>
<div class="row">
    <div class="col-md-12">
    <img style="width:300px;"src="/storage/post_images/{{$posts->post_image}}" >
    </div>

</div>
<p>{{$posts->description}}</p>
<small>created on{{$posts->created_at}}</small>
<hr>
<div style="display: flex;">
 <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Update</a>
 {!!Form::open(['route' => ['posts.destroy', $posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
</div>
 @endsection