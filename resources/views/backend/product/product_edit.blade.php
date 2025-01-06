@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Products</h4>
                    </div>

                    <form id="myForm" method="post" action="{{ route('update.product') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="form-group mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" id="inputProductTitle" value="{{ $products->product_name }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTags" class="form-label">Product Tags</label>
                                            <input type="text" name="product_tags" class="form-control" data-role="tagsinput" value="{{ $products->product_tags }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductSize" class="form-label">Product Size</label>
                                            <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="{{ $products->product_size }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductColor" class="form-label">Product Color</label>
                                            <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="{{ $products->product_color }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="inputProductDescription" class="form-label">Short Description</label>
                                            <textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3" required>{{ $products->short_descp }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductLongDescription" class="form-label">Long Description</label>
                                            <textarea name="long_descp" class="form-control" id="inputProductLongDescription" rows="3">{{ $products->long_descp }}</textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="formFile" class="form-label">Main Thumbnail</label>
                                            <input name="product_thambnail" class="form-control" type="file" id="formFile" onChange="mainThamUrl(this)">
                                            <img src="" id="mainThmb" style="display: none;" />
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="multiImg" class="form-label">Multiple Images</label>
                                            <input class="form-control" name="multi_img[]" type="file" id="multiImg" multiple="">
                                            <div class="row" id="preview_img"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="form-group col-md-6">
                                                <label for="inputPrice" class="form-label">Product Price</label>
                                                <input type="text" name="selling_price" class="form-control" id="inputPrice" value="{{ $products->selling_price }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputDiscountPrice" class="form-label">Discount Price</label>
                                                <input type="text" name="discount_price" class="form-control" id="inputDiscountPrice" value="{{ $products->discount_price }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputProductCode" class="form-label">Product Code</label>
                                                <input type="text" name="product_code" class="form-control" id="inputProductCode" value="{{ $products->product_code }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputProductQuantity" class="form-label">Product Quantity</label>
                                                <input type="text" name="product_qty" class="form-control" id="inputProductQuantity" value="{{ $products->product_qty }}" required>
                                            </div>

                                            <div class="col-12">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="hotDeals" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="hotDeals">Hot Deals</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="featured" type="checkbox" value="1" id="featuredCheck" {{ $products->featured == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="featuredCheck">Featured</label>
                                                        </div>
                                                    </div>
                                                </div><!-- // end row -->
                                            </div>

                                            <hr>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-primary px-4" value="Publish" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /// Main Image Thumbnail Update /// -->
<div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Main Image Thumbnail</h6>
    <hr>
    <div class="card">
        <form method="post" action="{{ route('update.product.thambnail') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $products->id }}">
            <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Main Image Thumbnail</label>
                    <input name="product_thambnail" class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <img src="{{ asset($products->product_thambnail) }}" style="width:100px; height:100px;">
                </div>
                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
            </div>
        </form>
    </div>
</div><!-- /// End Main Image Thumbnail Update /// -->

<!-- /// Update Multi Image  ////// -->
<div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Multi Image</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">Image</th>
                        <th scope="col">Change Image</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <form method="post" action="{{ route('update.product.multiimage') }}" enctype="multipart/form-data">
                        @csrf

                        @foreach($multiImgs as $key => $img)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><img src="{{ asset($img->photo_name) }}" style="width:70px; height:40px;"></td>
                                <td><input type="file" class="form-group" name="multi_img[{{ $img->id }}]"></td>
                                <td>
                                    <input type="submit" class="btn btn-primary px-4" value="Update Image" />
                                    <a href="{{ route('product.multiimg.delete', $img->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /// End Update Multi Image  ////// -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                product_name: { required: true },
                short_descp: { required: true },
                product_thambnail: { required: true },
                multi_img: { required: false },
                selling_price: { required: true },
                product_code: { required: true },
                product_qty: { required: true },
            },
            messages: {
                product_name: { required: 'Please Enter Product Name' },
                short_descp: { required: 'Please Enter Short Description' },
                product_thambnail: { required: 'Please Select Product Thumbnail Image' },
                multi_img: { required: 'Please Select Product Multi Image' },
                selling_price: { required: 'Please Enter Selling Price' },
                product_code: { required: 'Please Enter Product Code' },
                product_qty: { required: 'Please Enter Product Quantity' },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#mainThmb').attr('src', e.target.result).show().width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#multiImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) { //check File API supported browser
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop through each file
                    if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100).height(80); //create image element
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

@endsection
