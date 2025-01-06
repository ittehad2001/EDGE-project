@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Message</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Sl</th>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($contact as $key => $item)
                                    <tr>
                                        <td> </td>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item->name }}</td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->message }} </td>
                                        <td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}  </td>
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
