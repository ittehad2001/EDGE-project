@extends('frontend.master_dashboard')
@section('frontend')


<br>
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
          <div class="page-content my-account__dashboard">
            <p>Hello <strong>{{ Auth::user()->name }}</strong> (not <strong>User</strong> <a href="login_register.html">Log out</a>)</p>
            <p>From your account dashboard you can view your <a class="unerline-link" href="account_orders.html">recent orders</a>, manage your <a class="unerline-link" href="account_edit_address.html">shipping and billing addresses</a>, and <a class="unerline-link" href="account_edit.html">edit your password and account details.</a></p>
          </div>
        </div>
      </div>
    </section>


@endsection