
@php
  $banner = App\Models\Banner::orderBy('banner_title','ASC')->get();
@endphp

<section class="category-banner container">
@foreach($banner as $item)
        <div class="row">
          <div class="col-md-6">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto" src="{{ asset( $item->banner_image ) }}" width="690" height="665" alt="">
              <div class="category-banner__item-mark" style="font-size:10px;">
              Quality that doesn't break the bank.
              </div>
              <div class="category-banner__item-content">
                <h3 class="mb-0">{{ $item->banner_title }}</h3>
                <a href="{{ $item->banner_url }}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
            <div class="pb-2"></div>
          </div>
          
        </div>

        @endforeach
</section>