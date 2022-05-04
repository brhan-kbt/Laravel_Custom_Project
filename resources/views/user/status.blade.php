@extends('user.dashboard')
@section('content')
   
<main class="container">
    <div class="card">
        <div class="row card-header">
            <div class="d-flex flex-column align-items-end">
                <h3>Total Promised: {{$promises->sum('promisedAmount')}}</h3>
                <h3>Total Paid: {{$promises->sum('paidAmount')}}</h3>
                <h3>Balance: {{$promises->sum('balance')}}</h3>
            </div>


        </div>
        <div class="row card-body">
            <table class="table table-responsive" id="myTable">
                
                <thead>
                    <tr>
                    <th class="col-1">No. #</th>
                    <th class="col-2">Member Name</th>
                    <th class="col-1">Promised Amount</th>
                    <th class="col-1">Paid Amount</th>
                    <th class="col-1">Balance</th>
                    <th class="col-2">Promised Date</th>
                    <th class="col-4">Reason</th>
                    
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
                    </tr>
                    @endforeach 
                </tbody>
            
            </table>
        </div>
    </div>

</main>
@endsection