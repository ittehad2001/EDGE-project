@extends('frontend.master_dashboard')
@section('frontend')
<br>
<br>

<div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Orders</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
          @include('frontend.dashboard.user_sidebar')
          </ul>
        </div>
       
      <div class="order-tracking">
      <form method="post" action="{{ route('order.tracking') }}" > 
      @csrf 
          <h2 class="page-title">Order Tracking</h2>
          <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
          <div class="form-floating my-4">
            <input type="text" class="form-control" name="code" type="text" placeholder="Your Order Invoice Number" id="order_tracking_id" required>
            <label for="order_tracking_id">Order ID *</label>
          </div>
         
          <button type="submit" class="btn btn-primary btn-track w-100" name="submit" value="Submit">TRACK</button>
        </form>
      </div>


        </div>
      </div>
    </section>


@endsection