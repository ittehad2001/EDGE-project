@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit State</h4>
                    </div>

               
                    <form id="myForm" method="post" action="{{ route('update.state') }}"   >
			@csrf

			<input type="hidden" name="id" value="{{ $state->id }}">

                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Division Name: </label>
                                <div class="col-sm-12 col-md-7">
                                <select name="division_id" class="form-select mb-3" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($division as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $state->division_id ? 'selected' : ''  }}>{{ $item->division_name }}</option>
                                    @endforeach
								</select>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">District Name: </label>
                                <div class="col-sm-12 col-md-7">
                                <select name="district_id" class="form-select mb-3" aria-label="Default select example">
			                  <option selected="">Open this select menu</option>
                                    @foreach($district as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $state->district_id ? 'selected' : ''  }}>{{ $item->district_name }}</option>
                                    @endforeach
								</select>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State Name: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="state_name" value="{{ $state->state_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Publish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                state_name: {
                    required : true,
                },
            },
            messages :{
                state_name: {
                    required : 'Please Enter State Name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


@endsection
