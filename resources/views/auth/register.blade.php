@extends('frontend.master_dashboard')
@section('frontend')
<br>
<br>
<div class="mb-4 pb-4"></div>
<section class="login-register container">
  <h2 class="d-none">Register</h2>
  <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link nav-link_underscore" id="register-tab" data-bs-toggle="tab" href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <div class="tab-content pt-2" id="login_register_tab_content">
    <div class="tab-pane fade" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
      <div class="register-form">
        <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
          @csrf
          <div class="form-floating mb-3">
            <input name="name" type="text" class="form-control form-control_gray" id="name" placeholder="Username" required>
            <label for="name">Username</label>
          </div>

          <div class="pb-3"></div>

          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control form-control_gray" id="email" placeholder="Email address *" required>
            <label for="email">Email address *</label>
          </div>

          <div class="pb-3"></div>

          <div class="form-floating mb-3">
            <input id="password" type="password" name="password" class="form-control form-control_gray" placeholder="Password *" required>
            <label for="password">Password *</label>
          </div>

          <div class="form-floating mb-3">
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" class="form-control form-control_gray" required>
            <label for="password_confirmation">Confirm Password *</label>
          </div>

          <div class="d-flex align-items-center mb-3 pb-2">
            <p class="m-0">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
          </div>

          <button class="btn btn-primary w-100 text-uppercase" type="submit" name="register">Register</button>
        </form>
      </div>
    </div>
  </div>
</section>
















@endsection
