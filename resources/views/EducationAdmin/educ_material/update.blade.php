@extends('EducationAdmin.dashboard')
@section('content')
<div class="container">
    <form action="{{route('educ_material.update',[$books->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
              <div class="card-body">
  
                <div class="form-group">
                    <label class="form-label" for="title" >Title</label>
                    <input type="text" name="title" value="{{ $books->title}}" class="form-control" />
                </div>
  
                 <div class="form-group">
                  <label class="form-label" for="Auther" >Auther</label>
                  <input type="text" name="Auther" value="{{ $books->Author }}" class="form-control" />
                </div>
  
               <div class="form-group">
                  <label class="form-label" for="type" >Type</label>
                  <input type="text" name="type" value="{{ $books->type  }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="publishDate" >publish Date</label>
                     <input type="date" name="publishDate" value="{{ $books->publishDate  }}" class="form-control" />
                </div>
                  <div class="form-group mb-4">
                     <textarea name="description" value="{{ $books->description }}" class="form-control"  ></textarea>
                </div>

                 <div class="form-group">
                    <label class="form-label" for="cover_image" >publish Date</label>
                     <input type="file" name="cover_image" value="{{ $books->cover_image  }}" class="form-control" />
                </div>

                 <div class="form-group">
                    <label class="form-label" for="filename" >publish Date</label>
                     <input type="file" name="filename" value="{{ $books->filename  }}" class="form-control" />
                </div>
  
                <div class="form-group">
                   <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            
               
              </div>
              </form>
</div>
    
@endsection