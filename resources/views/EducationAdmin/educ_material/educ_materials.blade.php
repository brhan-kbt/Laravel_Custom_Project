@extends('user.dashboard')
@section('content')<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
       @if(count($books)>0)
            @foreach($books as $book)
        <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
       
          <div class="card">
           <p></p>
            <div class="text-center">
              <img style="width:100px; height:100px"src="/storage/educ_photo/{{$book->cover_image}}" > 
            </div>
    
            
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="small"><a href="#!" class="mb-0"><strong>Title</strong></a></p>
                <p class="small text-danger">{{ $book->title }}</p>
              </div>
  
              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0"><strong>Auther</strong></h5>
                <h5 class="text-dark mb-0">{{ $book->Author }}</h5>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0"><strong>publish Date</strong></h5>
                <h5 class="text-dark mb-0">{{ $book->publishDate }}</h5>
              </div>
              <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <a href="#" class="btn btn-primary">See More</a>
               <a href="{{route('download', $book->id)}}" class="btn btn-primary">Download</a>
                   
              </div>
            </div>
           
          </div>
          
        </div>
   @endforeach
            @endif	  
      </div>
    </div>
  </section>
  @endsection
