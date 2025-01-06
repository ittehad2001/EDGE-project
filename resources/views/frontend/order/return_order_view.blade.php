@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    View Return Order::Ekobee 
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Orders</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
          @include('frontend.dashboard.user_sidebar')
          </ul>
        </div>

        <div class="col-md-9">
<div class="tab-content account dashboard-content pl-50">
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Your Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="background:#ddd;font-weight: 600;" >
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Totaly</th>
                            <th>Payment</th>
                            <th>Invoice</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{ $key+1 }}</td>
            <td> {{ $order->order_date }}</td>
           <td> ${{ $order->amount }}</td>
            <td> {{ $order->payment_method }}</td>
            <td> {{ $order->invoice_no }}</td>
            <td> {{ $order->return_reason }}</td>
            <td> 
@if($order->return_order == 0)
<span class="badge rounded-pill bg-warning">No Retrun Request</span>

@elseif($order->return_order == 1)
<span class="badge rounded-pill bg-danger">Pedding</span>

@elseif($order->return_order == 2)
<span class="badge rounded-pill bg-success">Success</span> 


@endif


            </td>


     <td><a href="{{ url('user/order_details/'.$order->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
     <a href="{{ url('user/invoice_download/'.$order->id) }}" class="btn-sm btn-danger"><i class="fa fa-download"></i> Invoice</a>
            </td>
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
                </div>
            </div>
        </div>




@endsection

