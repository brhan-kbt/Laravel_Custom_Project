@extends('EducationAdmin.dashboard')
@section('content')
<a href="/educ_material" class="btn btn-primary">Go back</a>

<h1>Show Page</h1>
<div class="row">
    <div class="col-md-12">
    <img style="width:300px;"src="/storage/educ_photo/{{$books->cover_image}}" >
    </div>  

</div>
<p> Title: {{$books->title}}</p>
<p>Auther: {{$books->Author}}</p>
<p>Description:{{$books->description}}</p>
<p>Type:{{$books->type}}</p>
<p>Publish Date:{{$books->publishDate}}</p>

<hr>
<div style="display: flex;">
 <a href="/posts/{{$books->id}}/edit" class="btn btn-primary">Download</a> 

</div>
 @endsection