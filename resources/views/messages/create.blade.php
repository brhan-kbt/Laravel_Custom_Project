
<main class="container">

    <h1>Create a new message</h1>
    <form action="{{action('MessageController@store')}}" method="POST">
            @csrf
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label  class="control-label">Subject</label>
                <input type="text" class="form-control" name="title" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            <label for="select-label">Reciepent's</label>
                <select name='reciepent_id' class="form-select mb-5" id="select-label">
                    <option class="p-4" value="">Select Reciepent here</option>
                    <option class="p-4" value="0">For All</option>
                    @foreach($admins as $admin)
                        <option class="p-4"  value="{{$admin->id}}">{{$admin->admin->adminName}}  (Admin)</option>
                    @endforeach
                    @foreach ($members as  $member)
                            <option class="p-4"  value="{{$member->id}}">{{$member->member->fullName}}  (Member)</option>
                    @endforeach
                </select>

                
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>

</main>