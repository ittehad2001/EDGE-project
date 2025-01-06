@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Slider</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Sl</th>
                                        <th>Slider Title</th>
                                        <th>Middle Title</th>
                                        <th>Short Title</th>
                                        <th>Slider Image </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $key => $item)	
                                    <tr>
                                        <td> </td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->slider_title }}</td>
                                        <td>{{ $item->middle_title }}</td>
                                        <td>{{ $item->short_title }}</td>
                                        <td> <img src="{{ asset($item->slider_image) }}" style="width: 70px; height:40px;" >  </td>
                                        <td>
                                        <a href="{{ route('edit.slider',$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.slider',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
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