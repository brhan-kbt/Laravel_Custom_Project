@extends('pradmin.dashboard')

@section('content')
<div class="container">

<a href="posts/create" class="btn btn-primary m-4">Create post</a>
@if(count($posts)>0)
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        
<div class="card">
    
    <ul class="list-group list-group-flush">
        <a href="" class="btn btn-primary"></a>
    @foreach($posts as $post)
     
    <div class="row mb-4">
        <div class="col-md-4">
            <img style="width:300px;"src="/storage/post_images/{{$post->post_image}}" >
            
        </div>
    
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p> 
            
        <p>
         <div style="display: flex;">
            <a href="{{route('editPost',['id'=>$post->id])}}" class="btn btn-primary">Update</a>
            {!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>
       </p>  
          
    <p><a href="#" class="link-item " style="text-decoration: none;">Posted: {{$post->created_at->diffForHumans()}}</a></p>
    
         
           
        </div>
 </div>
       <hr>
    
    @endforeach
   
    </ul>
    </div>
    </div>
</div>
    
</div>
@endif

@endsection