@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Coupon</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Sl</th>
                                        <th>Coupon Name </th>
                                        <th>Coupon Discount  </th>
                                        <th>Coupon Validity  </th>
                                        <th>Coupon Status  </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($coupon as $key => $item)
                                    <tr>
                                        <td> </td>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item->coupon_name }}</td>
                                        <td> {{ $item->coupon_discount }}% </td>
                                        <td> {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}  </td>
                                        <td>
                                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                <span class="badge rounded-pill bg-success">Valid</span>
                                                @else
                                                <span class="badge rounded-pill bg-danger">Invalid</span>
                                                @endif
                                        </td>

                                        <td>
                                                <a href="{{ route('edit.coupon',$item->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('delete.coupon',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>


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
</section>

@endsection
