@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    Cash on delivery::Ekobee 
@endsection

<br>

<div class="mb-4 pb-4"></div>
<section class="shop-checkout container">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
                <span></span> Cash On Delivery
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Cash On Delivery Payment</h3>
                <div class="d-flex justify-content-between">
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order Details</h4>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout"> 
                        <table class="table no-border">
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
                                        <td>Tk. <span id="grand-total">{{ $cartTotal - Session::get('coupon')['discount_amount'] + 80 }}</span></td> <!-- Default delivery fee as 80 -->
                                    </tr>
                                @else
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

                            // Update the hidden input with the selected shipping fee
                            document.getElementById('shipping-fee').value = shippingFee;
                        }
                    </script>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Make Cash Payment</h4>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <form action="{{ route('cash.order') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="shipping" id="shipping-fee" value="80">
                                <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                <input type="hidden" name="address" value="{{ $data['shipping_address'] }}">
                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                            </div>
                            <br>
                            <button class="btn btn-primary">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
