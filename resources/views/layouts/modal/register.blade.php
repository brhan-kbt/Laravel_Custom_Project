
<!-- Registration Modal Form -->
<div class="container m-10">
<div class="modal fade m-10" id="RegisterModalForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <!-- Registration Form -->
        <form action="{{action('MemberController@store')}}" method="POST">
          @csrf

          <div class="modal-header">
            <h5 class="modal-title text-center"> Registration Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{$errors}}
          
          <div class="modal-body">
              <div class="h3 text-center text-success font-weight-bold font-italic">Fill Personal Information Below</div>
            <hr>

            {{-- First row --}}

          <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="mfullname">Full Name<span class="text-danger">*</span></label>
                    <input type="text" name="mfullname" class="form-control"  id="mfullname"  >
                  </div>

                <div class="col-md-6 mb-3">
                    <label for="gfathername">Grand-Father Name<span class="text-danger">*</span></label>
                    <input type="text" name="gfathername" class="form-control" id="gfathername" placeholder="">
                </div>
          </div>
          
              {{-- second rw --}}

          <div class="row">
                <div class="col-md-6 mb-3">
                        <label for="mothername">Mother's Name<span class="text-danger">*</span></label>
                        <input type="text" name="mothername" class="form-control" id="mothername" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="birthplace">Birth Place<span class="text-danger">*</span></label>
                    <input type="text" name="birthplace" class="form-control" id="birthplace" placeholder="">
                </div>
          </div>


          {{-- Third Row --}}

          <div class="row">
              <div class="col-md-6 mb-3">
                    <label for="repetanceFname">Repetance Father Name<span class="text-danger">*</span></label>
                    <input type="text" name="repetanceFname" class="form-control" id="repetanceFname" placeholder="">
              </div>
              <div class="col-md-6 mb-3">
                    <label for="baptismalName">Baptismal Name<span class="text-danger">*</span></label>
                    <input type="text" name="baptismalName" class="form-control" id="baptismalName" placeholder="">
              </div>
          </div>

          {{-- Fourth row --}}

            <div class="row">
              <div class="col-md-6 mb-3">
                    <label for="churchBaptized">Church Baptized<span class="text-danger">*</span></label>
                    <input type="text" name="churchBaptized" class="form-control" id="churchBaptized" placeholder="">
              </div>
              <div class="col-md-6 mb-3">
                      <label for="phone">Phone <span class="text-danger">*</span></label>
                      <input type="tel" id="phone" name="phone" class="form-control"pattern="[0-9]{10}">
              </div>
            </div>


            {{-- Fifth Row --}}

            <div class="row ">
                    <div class="col-12 col-md-4 mb-3">
                          <label for="profileImg">Image<span class="text-danger">*</span></label>
                          <input type="file" name="profileImg" class="form-control" id="profileImg" placeholder="Enter image">
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                          <label for="mage">Age<span class="text-danger">*</span></label>
                          <input type="number" name="mage" class="form-control" id="mage" placeholder="">
                    </div>

                    <div class="col-6 col-md-5 mb-3 align-middle">
                           <label for="msex">Sex<span class="text-danger">*</span></label>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="msex" id="male" value="Male">
                          <label class="form-check-label" for="male">Male</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="msex" id="female" value="Female">
                          <label class="form-check-label" for="female">Female</label>
                      </div>
                    </div>
            </div>

            
            {{-- Sixth Row --}}

            <div class="row mb-3">
                <div class="col-10 mb-3">
                    <label for="address">Address<span class="text-danger">*</span></label>
                    <textarea name="address" class="form-control" id="address" cols="" rows=""></textarea>
                </div>
            </div>


      <div class="h3 mt-3 text-center text-success font-weight-bold font-italic">Fill Family Information Below</div>
      <hr>


    <table class="table mb-5">

      {{-- Header Information --}}

      <thead>
            <tr>
              <th scope="col-1">No</th>
              <th scope="col-3">Full Name</th>
              <th scope="col-2">Age</th>
              <th scope="col-1">Sex</th>
              <th scope="col-2">Date of Birth</th>
              <th scope="col-2">Relationship</th>
            </tr>
      </thead>

      {{-- Body of the table --}}

      <tbody>
        <tr>
          <div class="row"> {{--Start row of table--}}
             <th class="col-2">1</th>

             <td class="col-3">
               <input type="text" name="familyfullname1" class="form-control" id="familyfullname1" placeholder="">
              </td>

             <td class="col-2">
               <input type="number" name="familyage1" class="form-control col-1" id="familyage1" placeholder="">
             </td>

             <td class="col-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="familysex1" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="familysex1" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
             </td>

            <td class="col-2">
              <input type="text" name="familydob1" class="form-control " id="familydob1" placeholder="01/01/2022">
            </td>
           
            <td class=" col-2">
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">Wife</option>
                <option value="2">Son</option>
                <option value="3">Daughter</option>
              </select>
            </td>

          </div>{{--End of  row table--}}
        </tr>

           
      </tbody>
    </table>

      
        <div class="h3 text-center text-success font-weight-bold font-italic">Fill Username and Password Below</div>
        <hr>


        {{-- Row for Username and Password --}}
      <div class="row">
          <div class="col-6 mb-3">
                <label for="username">Username<span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" id="username" placeholder="">
            </div>
              
            <div class="col-6 mb-3">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="">
            </div>
      
      </div>

           {{-- <div class="row mb-3">
             <div class="col-6 mb-3">
                
              </div>

              <div class="col-6 ">
                <label for="Password">Confirm Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="">
              </div>
              
           </div> --}}

           {{-- Row for Register Button --}}
        <div class="modal-footer pt-4">                  
            <button type="submit" class="btn btn-success mx-auto w-50 h-20">Register</button>
        </div>

          <p class="text-center ">Have an account, <a class="text-success font-weight-bold cursor-pointer" role="button" data-bs-toggle="modal" data-bs-target="#LoginModalForm" >Login Here</a></p> 
         
       </form>
     </div>
   </div>
 </div>
</div>
