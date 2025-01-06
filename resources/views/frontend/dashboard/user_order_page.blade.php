@extends('frontend.master_dashboard')
@section('frontend')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
@media (max-width: 576px) {
  .orders-table {
    font-size: 14px; /* Adjust font size for smaller screens */
  }
  .my-account__orders-list {
    overflow-x: auto; /* Horizontal scroll on small screens */
  }
}
</style>
<br>
<div class="mb-4 pb-4"></div>
<section class="my-account container">
  <h2 class="page-title">Orders</h2>
  <div class="row">
    <div class="col-lg-3 col-md-4 mb-4">
      <ul class="account-nav">
        @include('frontend.dashboard.user_sidebar')
      </ul>
    </div>

    <div class="col-lg-9 col-md-8">
      <div class="page-content my-account__orders-list">
        <table class="orders-table table table-responsive-sm table-hover">
          <thead class="table-dark">
            <tr>
              <th>Sl</th>
              <th>Date</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Invoice</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($orders as $key => $order)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $order->order_date }}</td>
              <td>Tk. {{ $order->amount }}</td>
              <td>{{ $order->payment_method }}</td>
              <td>{{ $order->invoice_no }}</td>

              <td>
                @if($order->status == 'pending')
                <span class="badge bg-warning rounded-pill">Pending</span>
                @elseif($order->status == 'confirm')
                <span class="badge bg-info rounded-pill">Confirm</span>
                @elseif($order->status == 'processing')
                <span class="badge bg-danger rounded-pill">Processing</span>
                @elseif($order->status == 'deliverd')
                <span class="badge bg-success rounded-pill">Delivered</span>

                @if($order->return_order == 1)
                <span class="badge rounded-pill" style="background: red;">Return</span>
                @endif

                @endif
              </td>

              <td>
                <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-success">
                  <i class="fa fa-eye"></i> View
                </a>
                <a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger">
                  <i class="fa fa-download"></i> Invoice
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection