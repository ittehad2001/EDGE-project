@extends('admin.admin_dashboard')
@section('admin')



<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pending Review</h4>
                    </div>
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>Comment </th>
				<th>User </th>
				<th>Product </th>
				<th>Rating </th>
				<th>Status </th> 
				<th>Action</th> 
			</tr>
		</thead>
		<tbody>
	@foreach($review as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>
                <td>{{ Str::limit($item->comment, 25);  }}</td>
				<td>{{ $item['user']['name'] }}</td>
				<td>{{ $item['product']['product_name'] }}</td>
				<td>
			@if($item->rating == NULL)
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 1)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 4)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 5)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>

			@endif
					 </td>
					 <td>
					 	@if($item->status == 0)
 	<span class="badge rounded-pill bg-warning">Pending</span>
					 	@elseif($item->status == 1)
 <span class="badge rounded-pill bg-warning">Publish</span>
					 	@endif
					 </td>

				<td>
                <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger">Approve</a>
				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>Comment </th>
				<th>User </th>
				<th>Product </th>
				<th>Rating </th>
				<th>Status </th> 
				<th>Action</th> 
			</tr>
		</tfoot>
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