@extends('admin.admin_dashboard')
@section('admin')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Banner</h4>
                    </div>
                    <div class="container">
					<div class="main-body">
						<div class="row">

<div class="col-lg-8">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('seo.setting.update') }}"  >
			@csrf

		<input type="hidden" name="id" value="{{ $seo->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Title</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Author</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Keyword</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Meta Description </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="meta_description" class="form-control" value="{{ $seo->meta_description }}" />
				</div>
			</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
				</div>
			</div>
		</div>

		</form>



	</div>




							</div>
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