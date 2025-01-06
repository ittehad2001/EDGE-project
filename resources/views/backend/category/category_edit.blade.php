@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
    <div class="section-body">  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Categories</h4>
                    </div>
                    <form id="myForm" method="post" action="{{ route('update.category') }}" enctype="multipart/form-data" >
			@csrf

		 <input type="hidden" name="id" value="{{ $category->id }}">
		 <input type="hidden" name="old_image" value="{{ $category->category_image }}">
                        
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Name: </label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text"  name="category_name" class="form-control"  value="{{ $category->category_name }}"   />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand Image: </label>
                                <div class="col-sm-12 col-md-7">
                                <input type="file" name="category_image" class="form-control"  id="image"   />
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                                <div class="col-sm-12 col-md-7">
                                <img id="showImage" src="{{ asset($category->category_image)   }}" alt="Admin" style="width:100px; height: 100px;"  >
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input type="submit" class="btn btn-primary px-4" value="Save & Publish" />
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
                category_name: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
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
