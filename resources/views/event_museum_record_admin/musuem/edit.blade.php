@extends('pradmin.dashboard')
@section('content')
<h1>edit Record </h1>

{!! Form::open(['route'=>['musuem.update',$posts->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('recordName','recordName')}}
    {{Form::text('recordName',$posts->recordName,['class'=>'form-control','placeholder'=>'Record Name'])}}
    </div>

    <div class="form-group mb-3">     
        {{Form::label('title','Description:')}}
         {{Form::textarea('description',$posts->description,['class'=>'form-control','placeholder'=>'type your description here..'])}}

</div>
<div class="form-group mb-3">     
        {{Form::file('recordimage')}}
</div> 
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}


@endsection