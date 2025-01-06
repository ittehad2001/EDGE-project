@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}"  class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">{{ $adminData->name }}</a>
                      </div>
                      <div class="author-box-job">{{ $adminData->email }}</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                        {{ $adminData->address }}
                        </p>
                      </div>

                      <div class="author-box-description">
                        <p>
                        {{ $adminData->phone }}
                        </p>
                      </div>
                      <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold"></div>
                      </div>
                     
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  
                 
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">About</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">

                      <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" class="needs-validation">
    @csrf
    <div class="card-header">
        <h4>Edit Profile</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label>Admin Name</label>
                <input type="text" name="name" class="form-control" value="{{ $adminData->name }}" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-7 col-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $adminData->email }}" />
            </div>
            <div class="form-group col-md-5 col-12">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $adminData->phone }}" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label>Address</label>
                <!-- Correct the name attribute for Address -->
                <input type="text" name="address" class="form-control" value="{{ $adminData->address }}" />
            </div>

            <div class="form-group col-12">
                <label>Photo</label>
                <input type="file" class="form-control" id="image" name="photo" />
            </div>
        </div>

        <div class="form-group col-12">
            <img id="showImage" alt="image" src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" class="rounded-circle author-box-picture" width="100">
        </div>
    </div>
    <div class="card-footer text-right">
        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
    </div>
</form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                });
            </script>

@endsection