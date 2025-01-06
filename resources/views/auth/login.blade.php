@extends('frontend.master_dashboard')
@section('frontend')

<br>
<br>
<div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <h2 class="d-none">Login & Register</h2>
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
          <div class="login-form">
            <form name="login-form" form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
            @csrf
              <div class="form-floating mb-3">
              <input id="login" type="login" class="form-control @error ('login) is-invalid @enderror" name="login" tabindex="1" required autofocus>
                    @error('login')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  <label for="email">Email/Name/Phone</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">

              <input id="password" type="password"  class="form-control form-control_gray"  name="password">
              <label for="customerPasswordInput" class="form-label">Password *</label>
              </div>

              <div class="d-flex align-items-center mb-3 pb-2">
                <div class="form-check mb-0">
                  <input name="remember" class="form-check-input form-check-input_fill" type="checkbox" value="" id="flexCheckDefault1">
                  <label class="form-check-label text-secondary" for="flexCheckDefault1">Remember me</label>
                </div>
                <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


        </div>

              </div>

              <button class="btn btn-primary w-100 text-uppercase" type="submit"> {{ __('Log in') }}</button>

              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="{{ route('register') }}" class="btn-text js-show-register">Create Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


@endsection
