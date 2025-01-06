@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    MyCart::Ekobee 
@endsection

<br>

<div class="mb-4 pb-4"></div>
<section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      <div class="checkout-steps">
        <a href="shop_cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="shop_checkout.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="shop_order_complete.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="cartPage">
              
            </tbody>
          </table>

@if(Session::has('coupon'))

@else
<div class="cart-table-footer" id="couponField">
  <form action="#" class="position-relative bg-body">
    <!-- Correct the id here to "coupon_name" -->
    <input class="form-control" id="coupon_name"  placeholder="Coupon">
    <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="button" value="APPLY COUPON" onclick="applyCoupon()">
  </form>
  <button class="btn btn-light" onclick="applyCoupon()">UPDATE CART</button>
</div>
@endif
   
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Cart Totals</h3>
              <table class="cart-totals">
    <tbody id="couponCalField">
        
    </tbody>
</table>


            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
              <a href="{{ route('checkout') }}" class="btn btn-primary btn-checkout">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection