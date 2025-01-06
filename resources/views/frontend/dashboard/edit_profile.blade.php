@extends('frontend.master_dashboard')
@section('frontend')

<div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">My Account</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
           @include('frontend.dashboard.user_sidebar')
          </ul>
        </div>
<div class="col-lg-9">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">

            <form name="account_edit_form" class="needs-validation" novalidate method="post" action="{{ route('profile.store') }}">
              @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-floating my-3">
                      <input type="text" name="name" class="form-control" id="account_first_name" placeholder="Name"  value="{{$profileData->name}}">
                      <label for="account_first_name">Name</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating my-3">
                      <input type="text" class="form-control" id="account_last_name" name="phone" placeholder="Last Name" value="{{$profileData->phone}}">
                      <label for="account_last_name">Phone</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input type="text" class="form-control" id="account_display_name" name="address" placeholder="address"  value="{{$profileData->address}}">
                      <label for="account_display_name">Address</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input type="email" class="form-control" id="email" placeholder="Email Address"  name="email"  value="{{$profileData->email}}" >
                      <label for="account_email">Email Address</label>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-12">
                    <div class="my-3">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>



@endsection