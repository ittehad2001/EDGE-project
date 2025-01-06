@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $item)
                                    <tr>
                                        <td> </td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td> <img src="{{ asset($item->category_image) }}" style="width: 70px; height:40px;" >  </td>
                                        <td>
                                        <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger"  id="delete">Delete</a>
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
