@extends('memberadmin.dashboard')
@section('content')
<main class="container">
<div class="card">
  <div class="card-header">
   <div class="row">
        <div class="col-md-6">
             <p>Total Members: {{$members->count()}} </p>
        </div>
        <div class="col-md-6">
              <a href="{{action('MemberController@create')}}" class="btn btn-success float-right">Add Member</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    
    
<div class="row">
 <table class="table table-striped table-hover table-responsive" id="myTable">
    <thead>
        <tr>
        <th>No.#</th>
        <th>Full Name</th>
        <th>Mother Name</th>
        <th>Baptismal Name</th>
        <th>Rep-F-Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$member->fullName}}</td>
        <td>{{$member->motherName}}</td>
        <td>{{$member->baptismalName}}</td>
        <td>{{$member->repetanceFatherName}}</td>
        <td>{{$member->phone}}</td>
        <td>{{$member->address}}</td>
        <td>
            <button class="btn-sm btn-danger">
               {{$member->status}}
            </button>

        </td>
        <td>
            <div class="d-flex">
                <a href="{{action('MemberController@edit', ['manage_member'=>$member->id])}}" title="edit" class=" text-success"><i class="fa fa-edit"></i></a>
            
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
