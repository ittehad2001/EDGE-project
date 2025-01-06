@section('title')
   Hot_Deals Collection::Ekobee 
@endsection
<section class="hot-deals container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
            <h2 class="fw-bold">Get All New Fresh Collection</h2>
            <a href="shop2.html" class="btn-link default-underline text-uppercase fw-medium mt-3">View All</a>
        </div>
        <div class="col-md-6 col-lg-8 col-xl-80per">
            <div class="position-relative">
                <div class="swiper-container js-swiper-slider"
                     data-settings='{
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 4,
                        "effect": "none",
                        "loop": false,
                        "breakpoints": {
                          "320": {
                            "slidesPerView": 2,
                            "slidesPerGroup": 2,
                            "spaceBetween": 14
                          },
                          "768": {
                            "slidesPerView": 2,
                            "slidesPerGroup": 3,
                            "spaceBetween": 24
                          },
                          "992": {
                            "slidesPerView": 3,
                            "slidesPerGroup": 1,
                            "spaceBetween": 30,
                            "pagination": false
                          },
                          "1200": {
                            "slidesPerView": 4,
                            "slidesPerGroup": 1,
                            "spaceBetween": 30,
                            "pagination": false
                          }
                        }
                      }'>

@php
$hot_deals = App\Models\Product::where('hot_deals',1)->orderBy('id','DESC')->get();
@endphp


                    <div class="swiper-wrapper">
                        @foreach($hot_deals as $item)
                        <div class="swiper-slide product-card product-card_style3">
                            <div class="pc__img-wrapper">
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                    <img loading="lazy" src="{{ asset( $item->product_thambnail ) }}" width="258" height="313" alt="{{ $item->product_name }}" class="pc__img">
                                </a>
                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title">
                                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a>
                                </h6>

                                <div class="product-card__price d-flex align-items-center">
                                    @if($item->discount_price == NULL)
                                    <span class="money price-old">Tk. {{ $item->selling_price }}</span>
                                    @else
                                    <span class="money price-old">Tk. {{ $item->selling_price }}</span>
                                    <span class="money price text-secondary">Tk.{{ $item->discount_price }}</span>
                                    @endif
                                </div>

                                <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view" id="{{ $item->id }}" onclick="productView(this.id)">
                                        <span class="d-none d-xxl-block">Quick View</span>
                                        <span class="d-block d-xxl-none">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_view" />
                                            </svg>
                                        </span>
                                    </button>
                                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist" id="{{ $item->id }}" onclick="addToWishList(this.id)"  >
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach <!-- End of foreach loop -->
                    </div> <!-- /.swiper-wrapper -->
                </div> <!-- /.swiper-container js-swiper-slider -->
            </div> <!-- /.position-relative -->
        </div>
    </div>
</section>
