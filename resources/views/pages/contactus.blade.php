@extends('layouts.app')
@section('content')


<main class="">
    <div class="container row_width">
        <div class="row ">
            <div class="col-md-6 first_column  mt-3" style="font-weight: bold">
                 <div class="row mb-2">
                        <h2>Contact Information!</h2>
                        <hr class="header_separator">
                    </div>
                    
               <div class="row">
                    <div class="col-12">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                       <h2>Address</h2>
                    </div>
                    <div class="col-12 offset-1">
                      <p>Ethiopia, Addis Ababa, 6 Kilo</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                       <h2>Call Us.</h2>
                    </div>

                    <div class="col-12 offset-1">
                        <p>+251-905-2802-74</p>
                        <p>+251-905-2802-74</p>
                        <p>+251-905-2802-74</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                       <h2>Email Us.</h2>
                    </div>
                     <div class="col-12 offset-1">
                        <p>berhanukebito@gmail.com</p>
                        <p>berhanukebito@gmail.com</p>
                        <p>berhanukebito@gmail.com</p>
                     </div>
                </div>
          
        </div>
        <div class="col-md-6 second_column  edit_contact mb-10">
                <div class="row mt-3">
                    <div class="row mb-2">
                        <h2 class="text-center">Send Us a Message!</h2>
                          <hr class="header_separator text-center">
                    </div>
                  
              <form action="{{action('MessageController@store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row" style="margin: 20px">
                        <div class="form-group col-12">
                            <div class="row mb-2">
                                <label for="senderName">Full Name</label>
                            </div>
                            <div class="row offset-1 mb-3">
                             <input type="text" class="form-control" name="senderName" id="senderName" placeholder="Full Name">
                            </div>
                        </div>


                        <div class="form-group col-12 mb-3">
                            <div class="row mb-2">
                                <label for="email">Email or Phone Number</label>
                            </div>
                            
                            <div class="row offset-1 mb-2">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="">
                            </div>
                       </div>

                       <div class="form-group col-12">
                            <div class="row mb-2">
                                <label for="title">Subject</label>
                            </div>
                            <div class="row offset-1 mb-3">
                             <input type="text" class="form-control" name="title" id="title" placeholder="Subject">
                            </div>
                        </div>

                       <div class="form-group col-12">
                           <div class="row mb-2">
                              <label for="message">Message</label>
                           </div>
                           <div class="row offset-1 mb-2">
                               <textarea name="message" class="form-control" id="message" cols="30" rows="5"  placeholder="Message here..."></textarea>
                           </div>
                       </div>

                       <div class="text-center">
                                <button type="submit" class="btn btn-success text-center ">Send Message</button>
                       </div>

                       @include('layouts.messages')
                    </div>
                </form>
                </div>
            </div>
    </div>
    </div>
    <div class="map-responsive mapw">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.1503603359524!2d38.76000701478677!3d9.050046193506269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf56ae613b7ea5f7c!2sMeskaye%20Hizunan%20Medhane%20Alem%20Monastery%20High%20School!5e0!3m2!1sen!2set!4v1644144452788!5m2!1sen!2set" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>	</div>
  </main>
@endsection