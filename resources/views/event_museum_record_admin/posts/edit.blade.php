@extends('pradmin.dashboard')
@section('content')
<div class="container">
<h1>edit post post</h1>

{!! Form::open(['route'=>['posts.update',$posts->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    <div class="form-group mb-3">     
        {{Form::label('title','Description:')}}
         {{Form::textarea('description',$posts->description,['class'=>'form-control','placeholder'=>'type your description here..'])}}

</div>
<div class="form-group mb-3">     
        {{Form::file('post_emage')}}
</div> 
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}

</div>
@endsection