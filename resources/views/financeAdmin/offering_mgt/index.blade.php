@extends('financeAdmin.dashboard')
@section('content')

    
<main class="container">
    <div class="card">
        <div class="row card-header">
            <div class="col-6">

            </div>
            <div class="col-6">
                 <a href="{{action('OfferingController@create')}}" class="btn btn-success float-right">Add Offering</a>
            </div>
        </div>

        <div class="row card-body">
    <table class="table  table-responsive table-striped table-hover" id="myTable">

    <thead>
        <tr>
        <th class="col-1">No. #</th>
        <th class="col-2">Member Name</th>
        <th class="col-2">Phone</th>
        <th class="col-2">Date</th>
        <th class="col-2">Amount</th>
        <th class="col-2">Reason</th>
        <th class="col-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offerings as $offering)
        <tr>
            <td>{{$loop->iteration}}</td>
        <td>{{$offering->memberName}}</td>
        <td>{{$offering->phone}}</td>
        <td>{{$offering->date}}</td>
        <td>{{$offering->amount}}</td>
        <td>{{$offering->reason}}</td>
        <td>
            <div class="d-flex">
                <a href="{{action('OfferingController@edit', ['offering'=>$offering->id])}}" class="fa fa-edit text-success" title="edit"></a>
            </div>
            
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>

    </div>

</main>



@endsection


      