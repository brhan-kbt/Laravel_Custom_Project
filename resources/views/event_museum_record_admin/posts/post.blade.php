@extends('pradmin.dashboard')
@section('content')
<div class="container">
<h1>create post</h1>
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
 
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
     
     <div class="form-outline mb-4">
     
    <label class="form-label" for="title" >Title</label>
    <input type="text" name="title" class="form-control" />
  </div>
 <!-- Message input -->
  <div class="form-outline mb-4"> 
     <label class="form-label" for="description">Description</label>
    <textarea class="form-control" name="description"  rows="4"></textarea>

  </div>

   <div class="form-outline mb-4">
    <input type="file" id="form3example3" name="post_image"class="form-control" />
    
  </div>


  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4"> Post </button>
</form>
    </div>
</div>
</div>
@endsection