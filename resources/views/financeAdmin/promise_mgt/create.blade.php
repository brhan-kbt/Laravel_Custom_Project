@extends('financeAdmin.dashboard')
@section('content')


<main class="container">
    <form action="{{action('PromiseController@store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-sm-5 ">
                <div class="mb-3">
                <label for="memberName" class="form-label">Member Name</label>
                <input type="text" name="memberName" class="form-control @error('memberName') is-invalid @enderror" value="{{ old('memberName') }}"  autocomplete="memberName" autofocus  id="email" >
                
                  @error('memberName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
            <div class="col-sm-5">
                <div class="mb-3">
                <label for="balance" class="form-label">Promised Amount</label>
                <input type="number" name="balance" class="form-control @error('balance') is-invalid @enderror" value="{{ old('balance') }}"  autocomplete="balance" autofocus  id="balance">

                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="mb-3">
                <label for="paidAmount" class="form-label">Paid Amount</label>
                <input type="number" name="paidAmount" class="form-control @error('paidAmount') is-invalid @enderror" value="{{ old('paidAmount') }}"  autocomplete="paidAmount" autofocus  id="paidAmount">

                @error('paidAmount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            
            </div>
            </div>

            <div class="col-sm-5">
                <div class="mb-3">
                <label for="promisedAmount" class="form-label">Balance</label>
                <input type="number" name="promisedAmount" class="form-control @error('promisedAmount') is-invalid @enderror" value="{{ old('promisedAmount') }}"  autocomplete="promisedAmount" autofocus  id="promisedAmount">

                @error('promisedAmount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 ">
                <div class="mb-3">
                <label for="promisedDate" class="form-label">Promised Date</label>
                <input type="date" name="promisedDate" class="form-control @error('promisedDate') is-invalid @enderror" value="{{ old('promisedDate') }}"  autocomplete="promisedDate" autofocus id="promisedDate">
            
                 @error('promisedDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            </div>
            </div>
           
             <div class="col-10 ">
                <div class="mb-3">
                <label for="reason" class="form-label">Reason</label>
                <textarea type="text" cols="10" rows="6" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason') }}"  autocomplete="reason" autofocus  id="email" > </textarea>
                
                  @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
            </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>

        </div>
</form>
</main>

@endsection