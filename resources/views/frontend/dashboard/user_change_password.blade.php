@extends('frontend.master_dashboard')
@section('frontend')


<div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">CHANGE PASSWORD</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
          @include('frontend.dashboard.user_sidebar')
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">
              <form name="account_edit_form" class="needs-validation" novalidate method="post" action="{{ route('user.update.password') }}">
              @csrf

              @if (session('status'))
         <div class="alert alert-success" role="alert">
                {{session('status')}}
         </div>
         @elseif(session('error'))
         <div class="alert alert-danger" role="alert">
            {{session('error')}}
         </div>
         @endif

                <div class="row">
                  <div class="col-md-12">
                    <div class="my-3">
                      <h5 class="text-uppercase mb-0">Password Change</h5>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                       <input  class="form-control @error('old_password') is-invalid @enderror"  name="old_password" type="password" id="current_password"    placeholder="Old Password"  />
                       @error('old_password')
                       <span class="text-danger">{{ $message }}</span>
                        @enderror
                      <label for="account_current_password">Current password</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                    <input  class="form-control @error('new_password') is-invalid @enderror"  name="new_password" type="password" id="new_password"   placeholder="New Password"  />
                         @error('new_password')
                          <span class="text-danger">{{ $message }}</span>
                            @enderror
                      <label for="account_new_password">New password</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating my-3">
                      <input class="form-control" data-cf-pwd="#account_new_password" name="new_password_confirmation" type="password" id="new_password_confirmation" placeholder="Confirm new password" required>
                      <label for="account_confirm_password">Confirm new password</label>
                      <div class="invalid-feedback">Passwords did not match!</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="my-3">
                      <button class="btn btn-primary" type="submit" name="submit" value="Submit">Save Changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection