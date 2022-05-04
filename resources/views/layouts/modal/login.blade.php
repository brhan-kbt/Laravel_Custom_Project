
<!-- Login Modal Form -->
<div class="modal fade" id="LoginModalForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- Login Form -->
        <form action="">
          <div class="modal-header">
            <h5 class="modal-title"> Login Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="Username">Username<span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" id="Username" placeholder="Enter Username">
            </div>

            <div class="mb-3">
                <label for="Password">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="remember" required>
                <label class="form-check-label" for="remember">Remember Me</label>
                <a href="#" class="float-end">Forgot Password</a>
            </div>
          </div>
          <div class="modal-footer pt-4">                  
            <button type="button" class="btn btn-success mx-auto w-100">Login</button>
          </div>
          <p class="text-center">Not yet account, <a class="text-success font-weight-bold cursor-pointer" role="button" data-bs-toggle="modal" data-bs-target="#RegisterModalForm" >Register Here</a></p> 
      </form>
    </div>
  </div>
</div>

