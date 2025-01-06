@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All State</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Sl</th>
                                        <th>Division Name </th>
                                        <th>District Name </th>
                                        <th>State Name </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($state as $key => $item)
                                    <tr>
                                        <td> </td>
                                        <td>{{ $key+1 }}</td>
                                        <td> {{ $item['division']['division_name'] }}</td>
                                        <td> {{ $item['district']['district_name'] }}</td>
                                        <td> {{ $item->state_name }}</td>
                                        <td>
                                            <a href="{{ route('edit.state',$item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.state',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
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
