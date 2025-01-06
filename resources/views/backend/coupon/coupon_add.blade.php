@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Coupon</h4>
                    </div>

                     <form id="myForm" method="post" action="{{ route('store.coupon') }}"   >
			         @csrf


                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Name: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="coupon_name" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Discount(%): </label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text" name="coupon_discount"  class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Validity Date: </label>
                                <div class="col-sm-12 col-md-7">
                                <input type="date" name="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control"   />
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
                coupon_name: {
                    required : true,
                },
                coupon_discount: {
                    required : true,
                },
            },
            messages :{
                coupon_name: {
                    required : 'Please Enter Coupon Name',
                },
                coupon_discount: {
                    required : 'Please Enter Coupon Discount',
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
