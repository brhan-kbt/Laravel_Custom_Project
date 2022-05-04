@extends('financeAdmin.dashboard')
@section('content')

    
<main class="container">
<div class="card">
  <div class="card-header">
   <div class="row">
        <div class="col-md-6">
             <p>Total Members: 0 </p>
        </div>
        <div class="col-md-6">
                 <a href="{{action('PromiseController@create')}}" class="btn btn-success float-right">Add Promise</a>
        </div>
    </div>
  </div>
<div class="card-body">
<div class="row">
 <table class="table table-striped table-hover table-responsive" id="myTable">
    <thead>
       <tr>
        <th>No. #</th>
        <th scope="col">Member Name</th>
        <th scope="col">Promised Amount</th>
        <th scope="col">Paid Amount</th>
        <th scope="col">Balance</th>
        <th scope="col">Promised Date</th>
        <th scope="col">Reason</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($promises as $promise)
        <tr>
            <td>{{$loop->iteration}}</td>
        <td>{{$promise->memberName}}</td>
        <td>{{$promise->promisedAmount}}</td>
        <td>{{$promise->paidAmount}}</td>
        <td>{{$promise->balance}}</td>
        <td>{{$promise->promisedDate}}</td>
        <td>{{$promise->reason}}</td>
        <td>
            <div class="d-flex">
                <a href="{{action('PromiseController@edit', ['promise'=>$promise->id])}}" title="edit" class="fa fa-edit text-success"></a>
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
