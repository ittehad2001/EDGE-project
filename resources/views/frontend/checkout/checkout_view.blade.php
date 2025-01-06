@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    Checkout::Ekobee 
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Shipping and Checkout</h2>
      <div class="checkout-steps">
        <a href="shop_cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="shop_checkout.html" class="checkout-steps__item active">
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

      <form action="{{ route('checkout.store') }}" method="POST">
    @csrf

    <div class="checkout-form">
        <div class="billing-info__wrapper">
            <h4>BILLING DETAILS</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating my-3">
                    <input type="text" class="form-control" required=""   name="shipping_name" value="{{ Auth::user()->name }}" placeholder="Name">
                        <label for="checkout_first_name">Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating my-3">
                        <input  type="email" required="" name="shipping_email" value="{{ Auth::user()->email }}" class="form-control"  placeholder="Phone *">
                        <label for="checkout_phone">Mail *</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating my-3">
                        <input required="" type="text" name="shipping_phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Your Phone *">
                        <label for="checkout_email">Your Phone *</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mt-3 mb-3">
                        <input required="" type="text" name="shipping_address" class="form-control" placeholder="Address *" value="{{ Auth::user()->address }}" placeholder="Full Address *">
                        <label for="checkout_street_address">Address *</label>
                    </div>
                </div>

                <!-- Select dropdown for Division -->
                <div class="col-md-12">
                    <div class="form-floating my-3">
                        <select name="division_id" class="form-control" id="checkout_division">
                            <option value="">Select Division*</option>
                            @foreach($divisions as $item)
                                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                            @endforeach
                        </select>
                        <label for="checkout_division">Division*</label>
                    </div>
                </div>

                <!-- Select dropdown for District -->
                <div class="col-md-12">
                    <div class="form-floating my-3">
                        <select name="district_id" class="form-control" id="checkout_city">
                        </select>
                        <label for="checkout_city">District*</label>
                    </div>
                </div>

                <!-- Select dropdown for City/Town -->
                <div class="col-md-12">
                    <div class="form-floating my-3">
                        <select name="state_id" class="form-control" id="checkout_zipcode">
                        </select>
                        <label for="checkout_zipcode">City/ Town *</label>
                    </div>
                </div>

                <!-- Order Notes -->
                <div class="col-md-12">
                    <div class="mt-3">
                        <textarea class="form-control form-control_gray" placeholder="Order Notes (optional)" cols="30" rows="8"></textarea>
                    </div>
                </div>
            </div> <!-- End of row -->
        </div>

        <!-- Order Summary -->
        <div class="checkout__totals-wrapper">
            <div class="sticky-content">
                <div class="checkout__totals">
                <h3>Your Order</h3>
            <table class="checkout-cart-items">
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $item) 
                    <tr>
                        <td>
                            {{ $item->name }} x {{ $item->qty }}
                        </td>
                        <td>
                            Tk. {{ $item->price * $item->qty }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="checkout-totals">
                <tbody>
                    @if(Session::has('coupon'))
                    <tr>
                        <th>SUBTOTAL</th>
                        <td>Tk. {{ $cartTotal }}</td>
                    </tr>
                    <tr>
                        <th>SHIPPING</th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="80" id="inside_dhaka" onclick="updateTotal(80)">
                                <label class="form-check-label" for="inside_dhaka">Inside Dhaka: Tk. 80</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="150" id="outside_dhaka" onclick="updateTotal(150)">
                                <label class="form-check-label" for="outside_dhaka">Outside Dhaka: Tk. 150</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="100" id="sub_urban" onclick="updateTotal(100)">
                            <label class="form-check-label" for="sub_urban">Sub-Urban: Tk. 100</label>
                        </div>          

                        </td>
                    </tr>
                    <tr>
                        <th>Coupon Discount</th>
                        <td>Tk. {{ Session::get('coupon')['discount_amount'] }}</td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td>Tk. <span id="grand-total">{{ $cartTotal - Session::get('coupon')['discount_amount'] + shippingFee}}</span></td> <!-- Default delivery fee as 80 -->
                    </tr>
                    @else
                    <tr>
    <th>SHIPPING</th>
    <td>
        <div class="form-check">
            <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="80" id="inside_dhaka" onclick="updateTotal(80)">
            <label class="form-check-label" for="inside_dhaka">Inside Dhaka: Tk. 80</label>
        </div>
        <div class="form-check">
            <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="150" id="outside_dhaka" onclick="updateTotal(150)">
            <label class="form-check-label" for="outside_dhaka">Outside Dhaka: Tk. 150</label>
        </div>
        <div class="form-check">
            <input class="form-check-input form-check-input_fill" type="radio" name="shipping" value="100" id="sub_urban" onclick="updateTotal(100)">
            <label class="form-check-label" for="sub_urban">Sub-Urban: Tk. 100</label>
        </div>
    </td>
</tr>
<tr>
    <th>Grand Total</th>
    <td>Tk. <span id="grand-total">{{ $cartTotal + 80 }}</span></td> <!-- Default delivery fee as 80 -->
</tr>

                    @endif
                </tbody>
            </table>
                </div>

                
                <script>
                function updateTotal(shippingFee) {
                    var subtotal = {{ $cartTotal }};
                    var couponDiscount = {{ Session::has('coupon') ? Session::get('coupon')['discount_amount'] : 0 }};
                    var total = subtotal - couponDiscount + shippingFee;
                    
                    // Update the grand total in the view
                    document.getElementById('grand-total').innerText = total;
                }
            </script>


                <!-- Payment Methods -->
                <div class="checkout__payment-methods">
    <div class="form-check">
        <input class="form-check-input form-check-input_fill" type="radio" name="payment_option" value="bkash" id="checkout_payment_method_1" checked>
        <label class="form-check-label" for="checkout_payment_method_1">bKash transfer</label>
    </div>
    <div class="form-check">
        <input class="form-check-input form-check-input_fill" type="radio" name="payment_option" value="cash" id="checkout_payment_method_3">
        <label class="form-check-label" for="checkout_payment_method_3">Cash on delivery</label>
    </div>
    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="terms.html" target="_blank">privacy policy</a>.</p>
</div>

            
            <button type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</button>
        </div>
    </div>
</form>

    </section>

    <script>
function updateTotal(shippingFee) {
    var subtotal = {{ $cartTotal }};
    var couponDiscount = {{ Session::has('coupon') ? Session::get('coupon')['discount_amount'] : 0 }};
    var total = subtotal - couponDiscount + shippingFee;

    // Update the grand total in the view
    document.getElementById('grand-total').innerText = total;
}
</script>


    <script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="division_id"]').on('change', function(){
  				var division_id = $(this).val();
  				if (division_id) {
  					$.ajax({
  						url: "{{ url('/district-get/ajax') }}/"+division_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="state_id]').html('');
  							var d =$('select[name="district_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  		// Show State Data 
  		$(document).ready(function(){
  			$('select[name="district_id"]').on('change', function(){
  				var district_id = $(this).val();
  				if (district_id) {
  					$.ajax({
  						url: "{{ url('/state-get/ajax') }}/"+district_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="state_id"]').html('');
  							var d =$('select[name="state_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="state_id"]').append('<option value="'+ value.id + '">' + value.state_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>



@endsection