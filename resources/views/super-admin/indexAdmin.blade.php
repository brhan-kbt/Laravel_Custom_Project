@extends('super-admin.dashboard')
@section('content')
<main class="container">
<div class="card">
  <div class="card-header">
   <div class="row">
        <div class="col-md-6">
             <p>Total Members: {{$mgrs->count()}} </p>
        </div>
        <div class="col-md-6">
            <a href="{{action('AdminController@create')}}" class="btn btn-success float-right">Add Manager</a>
        </div>
    </div>
  </div>
  <div class="card-body">  
<div class="row">
 <table class="table table-striped table-hover table-responsive-sm" id="myTable">
   <thead>
        <tr>
        <th>No.#</th>
        <th>Full Name</th>
        <th>username</th>
        <th>Role</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mgrs as $mgr)
          
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$mgr->adminName}}</td>
        <td>{{$mgr->user->username}}</td>
        <td>{{$mgr->adminRole}}</td>
        <td>
            <div class="d-flex">
                <a href="{{action('AdminController@edit', ['managemgr'=>$mgr->id])}}" title="edit" class=""><i class="fas fa-edit mr-1"></i></a>
                <a href="#" class="" title="delete"><i class="fas fa-trash text-danger"></i></a>
{{--                         
                {!!Form::open(['action'=>['AdminController@destroy', $mgr->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit( &#xF5DE, ['class'=>'fas fa-trash-alt'])}}
                {!!Form::close()!!}  --}}


            </div>
            
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
  </div>
</div>

</main>
@endsection
