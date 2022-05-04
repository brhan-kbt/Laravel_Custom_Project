<main class="container">
    <div class="card">
        <div class=" row card-header">
            <div class="col-6">
                <p>Messaging Dashboard!</p>
            </div>
            <div class="col-6">
                 <a href="{{action('MessageController@create')}}" class="btn btn-primary float-right"> Send Message</a>
            </div>

        </div>
        <div class="row card-body">
            <table class="table" id="myTable">
                <h3>List of Messages</h3>
                <thead>
                    <tr>
                    <th scope="col">No. #</th>
                    <th scope="col">Sender Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$message->senderName}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->title}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{action('MessageController@show',$message->id)}}" class="btn-sm btn-success mr-1">Detail</a>
                        
                        
                            {!!Form::open(['action'=>['MessageController@destroy', $message->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn-sm btn-outline-danger'])}}
                            {!!Form::close()!!} 


                        </div>
                        
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>