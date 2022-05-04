@extends('financeAdmin.dashboard')
@section('content')
   

<main class="container">
    <form action="{{action('OfferingController@store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"  autocomplete="phone" autofocus  id="phone">

                @error('phone')
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
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}"  autocomplete="date" autofocus id="date">
            
                 @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
            </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}"  autocomplete="amount" autofocus id="amount">
            
                @error('amount')
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


      