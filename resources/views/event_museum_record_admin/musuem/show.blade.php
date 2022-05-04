@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-primary">Go back</a>
<h1>{{$posts->recordName}}</h1>
<div class="row">
    <div class="col-md-12">
    <img style="width:300px;"src="/storage/musuem_images/{{$posts->recordimage}}" >
    </div>

</div>
<p>{{$posts->description}}</p>
<small class="link-item "></small>
<p><a href="#" class="link-item " style="text-decoration: none;">Created on: {{$posts->created_at}}</a></p>

<hr>
<div style="display: flex; m-4">
 <p style="float: inline-end;">
     <a href="/musuem/{{$posts->id}}/edit" class="btn btn-info">Update </a> 
     </p>  
      {!!Form::open(['route' => ['musuem.destroy', $posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!} 
</div>
 @endsection