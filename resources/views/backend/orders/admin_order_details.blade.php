@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details</h4>
                    </div>

                    <div class="row">
                        <!-- Shipping Details -->
                        <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header"><h4>Shipping Details</h4></div> 
                                <hr>
                                <div class="card-body">
                                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                        <tr>
                                            <th>Shipping Name:</th>
                                            <th>{{ $order->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Shipping Phone:</th>
                                            <th>{{ $order->phone }}</th>
                                        </tr>
                                        <tr>
                                            <th>Shipping Email:</th>
                                            <th>{{ $order->email }}</th>
                                        </tr>
                                        <tr>
                                            <th>Shipping Address:</th>
                                            <th>{{ $order->adress }}</th>
                                        </tr>
                                        <tr>
                                            <th>Division:</th>
                                            <th>{{ $order->division->division_name }}</th>
                                        </tr>
                                        <tr>
                                            <th>District:</th>
                                            <th>{{ $order->district->district_name }}</th>
                                        </tr>
                                        <tr>
                                            <th>State:</th>
                                            <th>{{ $order->state->state_name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Post Code:</th>
                                            <th>{{ $order->post_code }}</th>
                                        </tr>
                                        <tr>
                                            <th>Order Date:</th>
                                            <th>{{ $order->order_date }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Order Details <span class="text-danger">Invoice: {{ $order->invoice_no }}</span></h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                        <tr>
                                            <th>Name:</th>
                                            <th>{{ $order->user->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <th>{{ $order->user->phone }}</th>
                                        </tr>
                                        <tr>
                                            <th>Payment Type:</th>
                                            <th>{{ $order->payment_method }}</th>
                                        </tr>
                                        <tr>
                                            <th>Transx ID:</th>
                                            <th>{{ $order->transaction_id }}</th>
                                        </tr>
                                        <tr>
                                            <th>Invoice:</th>
                                            <th class="text-danger">{{ $order->invoice_no }}</th>
                                        </tr>
                                        <tr>
                                            <th>Order Amount:</th>
                                            <th>${{ $order->amount }}</th>
                                        </tr>
                                        <tr>
                                            <th>Order Status:</th>
                                            <th><span class="badge bg-danger" style="font-size: 15px;">{{ $order->status }}</span></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>
                                                @if($order->status == 'pending')
                                                    <a href="{{ route('pending-confirm', $order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                                @elseif($order->status == 'confirm')
                                                    <a href="{{ route('confirm-processing', $order->id) }}" class="btn btn-block btn-success" id="processing">Processing Order</a>
                                                @elseif($order->status == 'processing')
                                                    <a href="{{ route('processing-delivered', $order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>
                                                @endif
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table" style="font-weight: 600;">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Vendor Name</th>
                                                <th>Product Code</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderItem as $item)
                                                <tr>
                                                    <td><img src="{{ asset($item->product->product_thambnail) }}" style="width:50px; height:50px;"></td>
                                                    <td>{{ $item->product->product_name }}</td>
                                                    <td>
                                                        @if($item->vendor_id == NULL)
                                                            Owner
                                                        @else
                                                            {{ $item->product->vendor->name }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->product->product_code }}</td>
                                                    <td>{{ $item->color ?? '....' }}</td>
                                                    <td>{{ $item->size ?? '....' }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>${{ $item->price }} <br> Total = ${{ $item->price * $item->qty }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
