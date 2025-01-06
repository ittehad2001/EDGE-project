@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    Home::Ekobee 
@endsection

<section class="swiper-container js-swiper-slider swiper-number-pagination slideshow h-xs-25rem"
      data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      @include('frontend.body.slider')<!-- /.slideshow-wrapper js-swiper-slider -->

      <div class="container">
        <div class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
        <!-- /.products-pagination -->
      </div><!-- /.container -->
    </section><!-- /.slideshow -->

    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    @include('frontend.home.hot_deals')

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        @include('frontend.home.banner')

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

     @include('frontend.home.featured')
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    
    <section class="instagram px-1 position-relative">
    
      <div class="row row-cols-2 row-cols-md-4 row-cols-xl-8">
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta5.jpg')}}" width="232" height="232" alt="Insta image 5">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta7.jpg')}}" width="232" height="232" alt="Insta image 7">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta8.jpg')}}" width="232" height="232" alt="Insta image 8">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta9.jpg')}}" width="232" height="232" alt="Insta image 9">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta10.jpg')}}" width="232" height="232" alt="Insta image 10">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta11.jpg')}}" width="232" height="232" alt="Insta image 11">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta12.jpg')}}" width="232" height="232" alt="Insta image 12">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="{{asset('frontend/assets//images/instagram/insta6.jpg')}}" width="232" height="232" alt="Insta image 6">
          </a>
        </div>
      </div>
      <a href="https://www.facebook.com/ekobbe.product.bd?mibextid=ZbWKwL" class="btn position-absolute position-center fw-medium px-4 d-flex align-items-center gap-2">
        <i class="fab fa-facebook-f"></i>
        <span>facebook</span>
      </a>
    </section>

    @endsection
