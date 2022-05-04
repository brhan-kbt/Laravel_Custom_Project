@extends('pradmin.dashboard')
@section('content')
<main class="contaier">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create church profile</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			<form action="{{route('church_profile.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
            <div class="card-body">

              <div class="form-group">
                  <label class="form-label" for="churchName" >Church Name</label>
                  <input type="text" name="churchName" class="form-control" />
              </div>

               <div class="form-group">
                <label class="form-label" for="address" >address</label>
                <input type="text" name="address" class="form-control" />
              </div>

             <div class="form-group">
                <label class="form-label" for="email" >email</label>
                <input type="email" name="email" class="form-control" />
              </div>

                <div class="form-group mb-4">
                  <label class="form-label" for="phone" >phone</label>
                  <input type="number" name="phone" class="form-control" />
              </div>
               <div class="form-group">
                   <input type="file" name="photo" class="form-control" />
              </div>

              <div class="form-group">
                 <input type="submit" value="Create" class="btn btn-success float-right">
              </div>
          
             
            </div>
			</form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
     
       
    </section>
    <!-- /.content -->
  </div>

</div> 
</main>
 @endsection