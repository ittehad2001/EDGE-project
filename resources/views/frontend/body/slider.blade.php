@php
$slider = App\Models\Slider::orderBy('slider_title','ASC')->get();
@endphp

<div class="swiper-wrapper" style="background-color:#e4e4e4;">
    @foreach($slider as $item)
        <div class="swiper-slide">
            <div class="overflow-hidden position-relative h-100">

                <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                    <!-- Corrected the src attribute -->
                    <img loading="lazy" src="{{ asset($item->slider_image) }}" height="733px" width= "400px" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto">
                </div>
                <p class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0"></p>
                <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                    <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">{{ $item->slider_title }}</h6>
                    <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">{{ $item->middle_title }}</h2>
                    <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">{{ $item->short_title }}</h2>
                    <a href="shop2.html" class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop Now</a>
                </div>

            </div>
        </div><!-- /.swiper-slide -->
    @endforeach
</div><!-- /.swiper-wrapper -->
