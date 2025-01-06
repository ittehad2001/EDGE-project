@extends('admin.admin_dashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Sliders</h4>
                    </div>

                    <form id="myForm" method="post" action="{{ route('store.slider') }}" enctype="multipart/form-data" >
			@csrf

                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slider Title: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-group" name="slider_title" >
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Middle Title: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="middle_title" class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Title: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="short_title" class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slider Image: </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="slider_image" class="form-control" id="image" required />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                                <div class="col-sm-12 col-md-7">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;"  >
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
                slider_title: {
                    required : true,
                },
                short_title: {
                    required : true,
                },
            },
            messages :{
                slider_title: {
                    required : 'Please Enter Slider Title',
                },
                short_title: {
                    required : 'Please Enter Short Title',
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




<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection
