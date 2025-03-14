@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      
      <div class="col-md-8">
        <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Profile</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('admin.profile.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                      <div class="col-12">	
                          <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <h5>Username <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input type="text" name="name" class="form-control" required="" value="{{ $adminData->name }}">
                                       </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <h5>Email <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input type="email" name="email" class="form-control" required="" value="{{ $adminData->email }}">
                                       </div>
                                   </div>
                              </div>
                           </div>					
                         
                          <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <h5>Foto Profile <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input type="file" name="profile_photo_path" class="form-control" id="profileImage"></div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <img id="showImage" src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;" alt="">
                              </div>
                          </div>
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
  
</div>


<script>
  $(document).ready(function() {
      $('#profileImage').change(function(e) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
  });
</script>
@endsection