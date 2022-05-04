@extends('EducationAdmin.dashboard')
@section('content')
    <div class="container">
        
    <a href="educ_material/create" class="btn btn-primary mb-4">Upload</a>

    <form action="" method="GET">
        <table class="table">
            @if (count($books)>0)
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>published date</th>
                <th>description</th>
                <th>Education Material</th>
                <th colspan="2">action</th>
            </tr>
           
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->Author }}</td>
                <td>{{ $book->type }}</td>
                <td>{{ $book->publishDate }}</td>
                <td>{{ $book->description }}</td>
                 <td>  <img style="width:50px; height:40px;"src="/storage/educ_photo/{{$book->cover_image}}"> </td> 
                <td>
                    <a href="{{action('EducMaterialController@edit', ['educ_material'=>$book->id])}}" class="btn btn-primary">update</a>
                    <a href=" {{ route('educ_material.destroy', $book->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            @else 
            <h1 style="margin: 20%; color:rgb(255, 0, 76)"> No books uploaded</h1>

            @endif
           
        </table>
    </form>
    </div>
@endsection