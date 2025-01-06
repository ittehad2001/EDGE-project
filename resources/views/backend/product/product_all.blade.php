@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table With State Save</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Sl</th>
                                <th>Image </th>
                                <th>Product Name </th>
                                <th>Price </th>
                                <th>QTY </th>
                                <th>Discount </th>
                                <th>Status </th> 
                                <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
    @foreach($products as $key => $item)		
                                <tr>
                                    <td> {{ $key+1 }} </td>				
                                    <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 70px; height:40px;" >  </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>
                                    @if($item->discount_price == NULL)
			<span class="badge rounded-pill bg-info">No Discount</span>
			@else
			@php
			$amount = $item->selling_price - $item->discount_price;
			$discount = ($amount/$item->selling_price) * 100;
			@endphp
		<span class="badge rounded-pill bg-danger"> {{ round($discount) }}%</span>
			@endif
					 </td>



				<td> @if($item->status == 1)
					<span class="badge rounded-pill bg-success">Active</span>
					@else
					<span class="badge rounded-pill bg-danger">InActive</span>
					@endif
				   </td>

        <td>
        <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>

<a href="{{ route('delete.product',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data" ><i class="fa fa-trash"></i></a>


@if($item->status == 1)
<a href="{{ route('product.inactive',$item->id) }}" class="btn btn-primary" title="Inactive"> <i class="fa-solid fa-thumbs-down"></i> </a>
@else
<a href="{{ route('product.active',$item->id) }}" class="btn btn-primary" title="Active"> <i class="fa-solid fa-thumbs-up"></i> </a>
@endif



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