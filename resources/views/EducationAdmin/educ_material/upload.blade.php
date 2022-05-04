@extends('EducationAdmin.dashboard')
@section('content')
<div class="container">
    <form action="{{route('educ_material.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
              <div class="card-body">
  
                <div class="form-group">
                    <label class="form-label" for="title" >Title</label>
                    <input type="text" name="title" class="form-control" />
                </div>
  
                 <div class="form-group">
                  <label class="form-label" for="Author" >Author</label>
                  <input type="text" name="Author" class="form-control" />
                </div>
  
               <div class="form-group">
                  <label class="form-label" for="type" >Type</label>
                  <input type="text" name="type" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="publishDate" >publish Date</label>
                     <input type="date" name="publishDate"class="form-control" />
                </div>
                  <div class="form-group mb-4">
                    <label class="form-label" for="description" >Description</label>
                     <textarea name="description" class="form-control" ></textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="cover_image" >Cover Image</label>
                  <input type="file" name="cover_image">
              </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="filename" >Upload File</label>
                 <input type="file" name="filename">
             </div> 
  
                <div class="form-group">
                   <input type="submit" value="Upload" class="btn btn-success float-right">
                </div>
            
               
              </div>
              </form>
</div>
    
@endsection