@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
    {{ $product->product_name }}::Ekobee 
@endsection

<br>
<br>
<div class="mb-md-1 pb-md-3"></div>
<section class="product-single container product-single__type-9" >
    <div class="row" id="product_det">
        <div class="col-lg-7">
            <div class="product-single__media" data-media-type="vertical-thumbnail">
                <div class="product-single__image">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($multiImage as $img)
                                <div class="swiper-slide product-single__image-item">
                                    <img loading="lazy" class="h-auto" src="{{ asset($img->photo_name) }}" width="674" height="674" alt="">
                                    <a data-fancybox="gallery" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_zoom" />
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev">
                            <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_prev_sm" />
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_next_sm" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="product-single__thumbnail">
                    <div class="swiper-container">
                        @foreach($multiImage as $img)
                            <div class="swiper-wrapper">
                                <div class="swiper-slide product-single__image-item">
                                    <img loading="lazy" class="h-auto" src="{{ asset($img->photo_name) }} " width="104" height="104" alt="">
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="d-flex justify-content-between mb-4 pb-md-2">
                <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                    <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $product->product_name }}</a>
                </div>

                <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                    <a href="product14_v9.html" class="text-uppercase fw-medium">
                        <svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_prev_md" />
                        </svg>
                        <span class="menu-link menu-link_us-s">Prev</span>
                    </a>
                    <a href="product16_v11.html" class="text-uppercase fw-medium">
                        <span class="menu-link menu-link_us-s">Next</span>
                        <svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_next_md" />
                        </svg>
                    </a>
                </div>
            </div>

            @if($product->product_qty > 0)
                <span class="stock-status in-stock">In Stock</span>
            @else
                <span class="stock-status out-stock">Stock Out</span>
            @endif

            <h1 class="product-single__name" id="dpname">{{ $product->product_name }}</h1>

            <div class="product-single__rating">
                <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_star" />
                    </svg>
                    <!-- Repeat SVG stars as necessary -->
                </div>

                @php
$reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
$avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
@endphp

@if($avarage == 0)

@elseif($avarage == 1 || $avarage < 2)                     
<div class="product-rating" style="width: 20%"></div>
@elseif($avarage == 2 || $avarage < 3)                     
<div class="product-rating" style="width: 40%"></div>
@elseif($avarage == 3 || $avarage < 4)                     
<div class="product-rating" style="width: 60%"></div>
@elseif($avarage == 4 || $avarage < 5)                     
<div class="product-rating" style="width: 80%"></div>
@elseif($avarage == 5 || $avarage < 5)                     
<div class="product-rating" style="width: 100%"></div>
@endif

                <span class="reviews-note text-lowercase text-secondary ms-1">({{ count($reviewcount)}} reviews)</span>
            </div>

            @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount / $product->selling_price) * 100;
            @endphp

            <div class="product-single__price">
                @if($product->discount_price == NULL)
                    <span class="current-price">Tk. {{ $product->selling_price }}</span>
                @else
                    <span class="current-price">Tk. {{ $product->discount_price }}</span>
                    <span class="old-price">Tk. {{ $product->selling_price }}</span>
                @endif
            </div>

            <div class="product-single__short-desc">
                <p>{{ $product->short_descp }}.</p>
            </div>

      <form name="addtocart-form" method="post">
               

          @if($product->product_size == NULL)
            @else
            <div class="product-single__swatches">
              <div class="product-swatch text-swatches">
                <label>Sizes</label>
                <div class="swatch-list">
                <select class="form-control unicase-form-control" id="dsize" name="size">
                   @foreach($product_size as $size)
                      <option value="{{ $size }}">{{ ucwords($size)  }}</option>
                    @endforeach
                      <!-- Sizes should be dynamically populated -->
                    </select>
                </div>
                <a href="#" class="sizeguide-link" data-bs-toggle="modal" data-bs-target="#sizeGuide">Size Guide</a>
              </div>
          @endif    

          @if($product->product_color= NULL)
          @else
              <div class="product-swatch color-swatches">
                <label>Color</label>
                <div class="swatch-list">
                <select class="form-control unicase-form-control" id="dcolor" name="color">
                @foreach($product_color as $color)
                      <option value="{{ $color }}">{{ ucwords($color)  }}</option>
                @endforeach
                      <!-- Colors should be dynamically populated -->
                    </select>
                </div>
              
              </div>
            </div>
            @endif
            <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="number" name="quantity" value="1" min="1" id="dqty" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div>
              <input type="hidden" id="dproduct_id" value="{{ $product->id }}"><!-- .qty-control -->
              <button type="submit" class="btn btn-primary btn-addtocart js-open-aside" data-aside="cartDrawer" onclick="addToCartDetails()">Add to Cart</button>
            </div>
      </form>

          
          <div class="product-single__addtolinks">
            <a href="#" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg><span>Add to Wishlist</span></a>
            <share-button class="share-button">
              <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_sharing" /></svg>
                <span>Share</span>
              </button>
              <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                <div id="Article-share-template__main" class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                  <div class="field grow mr-4">
                    <label class="field__label sr-only" for="url">Link</label>
                    <input type="text" class="field__input w-full" id="url" value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health" placeholder="Link" onclick="this.select();" readonly="">
                  </div>
                  <button class="share-button__copy no-js-hidden">
                    <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z" fill="currentColor"></path>
                    </svg>
                    <span class="sr-only">Copy link</span>
                  </button>
                </div>
              </details>
            </share-button>
            <script src="js/details-disclosure.js" defer="defer"></script>
            <script src="js/share.js" defer="defer"></script>
          </div>
          <div class="product-single__meta-info">
            <div class="meta-item">
              <label>Product Code::</label>
              <span>{{ $product->product_code }}</span>
            </div>
            <div class="meta-item">
              <label>Categories::</label>
              <span>  @if(isset($product['category']) && isset($product['category']['category_name']))
            {{ $product['category']['category_name'] }}
        @else
            Not Available
        @endif</span>
            </div>
            <div class="meta-item">
              <label>Tags::</label>
              <span> {{ $product->product_tags }}</span>
            </div>
          </div>

          <div id="product_single_details_accordion" class="product-single__details-accordion accordion">
            <div class="accordion-item">
              <h5 class="accordion-header" id="accordion-heading-11">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1" aria-expanded="true" aria-controls="accordion-collapse-1">
                  Description
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h5>
              <div id="accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="accordion-heading-11" data-bs-parent="#product_single_details_accordion">
                <div class="accordion-body">
                  <div class="product-single__description">
                    <h3 class="block-title mb-4">{{ $product->product_name }}</h3>
                    <p class="content">{!! $product->long_descp !!} </p>
                  </div>
                </div>
              </div>
            </div><!-- /.accordion-item -->

            <div class="accordion-item">
              <h5 class="accordion-header" id="accordion-heading-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2" aria-expanded="false" aria-controls="accordion-collapse-2">
                  Additional Information
                  <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
                </button>
              </h5>
              <div id="accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="accordion-heading-2" data-bs-parent="#product_single_details_accordion">
                <div class="accordion-body">
                  <div class="product-single__addtional-info">
                    <div class="item">
                      <label class="h6">Brand</label>
                      <span> @if(isset($product['brand']) && isset($product['brand']['brand_name']))
                       {{ $product['brand']['brand_name'] }}
                    @else
                       Not Available
                        @endif</span>
                    </div>
                    <div class="item">
                      <label class="h6">Dimensions</label>
                      <span>90 x 60 x 90 cm</span>
                    </div>
                    <div class="item">
                      <label class="h6">Size</label>
                      <span>{{ $product->product_size }}</span>
                    </div>
                    <div class="item">
                      <label class="h6">Color</label>
                      <span></span>{{ $product->product_color }}</span>
                    </div>
                    <div class="item">
                      <label class="h6">Storage</label>
                      <span>({{ $product->product_qty }}) Items In Stock</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.accordion-item -->


           
            <div class="accordion-item">
  <h5 class="accordion-header" id="accordion-heading-3">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-3">
      Reviews (3)
      <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
    </button>
  </h5>
  <div id="accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
    <div class="accordion-body">
      <h2 class="product-single__reviews-title">Reviews</h2>

      @php
        $reviews = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->limit(5)->get();
      @endphp

      @foreach($reviews as $item)
        <div class="product-single__reviews-list">
          <div class="product-single__reviews-item">
            <div class="customer-avatar">
              <img loading="lazy" src="{{ !empty($item->user->photo) ? url('upload/user_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="">
            </div>
            <div class="customer-review">
              <div class="customer-name">
                <h6>{{ $item->user->name }}</h6>
                <div class="reviews-group d-flex">
                  @for ($i = 0; $i < $item->rating; $i++)
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  @endfor
                </div>
              </div>
              <div class="review-date">{{ $item->created_at->diffForHumans() }}</div>
              <div class="review-text">
                <p>{{ $item->comment }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      @guest
        <p><b>To add a product review, you need to <a href="{{ route('login') }}">log in</a>.</b></p>
      @else
        <div class="product-single__review-form">
        <form class="form-contact comment_form" action="{{ route('store.review') }}" method="post" id="commentForm">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    @if($product->vendor_id == NULL)
        <input type="hidden" name="hvendor_id" value="">
    @else
        <input type="hidden" name="hvendor_id" value="{{ $product->vendor_id }}">
    @endif

    <table class="table" style="width: 60%; background-color:white;">
        <thead>
            <tr>
                <th class="cell-level">&nbsp;</th>
                <th>1 <i class="fa-solid fa-star"></i></th>
                <th>2 <i class="fa-solid fa-star"></i></th>
                <th>3 <i class="fa-solid fa-star"></i></th>
                <th>4 <i class="fa-solid fa-star"></i></th>
                <th>5 <i class="fa-solid fa-star"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="cell-level">Quality</td>
                <td><input type="radio" name="quality" class="radio-sm" value="1" required></td>
                <td><input type="radio" name="quality" class="radio-sm" value="2"></td>
                <td><input type="radio" name="quality" class="radio-sm" value="3"></td>
                <td><input type="radio" name="quality" class="radio-sm" value="4"></td>
                <td><input type="radio" name="quality" class="radio-sm" value="5"></td>
            </tr>
        </tbody>
    </table>

    <div class="col-12">
        <div class="form-group">
            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" required></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="button button-contactForm">Submit Review</button>
    </div>
</form>
        </div>
      @endguest

    </div>
  </div>
</div>
<!-- /.accordion-item -->
          </div>
        </div>
      </div>
    </section>
   

    <section class="products-carousel container">
  <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>

  <div id="related_products" class="position-relative">
    <div class="swiper-container js-swiper-slider"
      data-settings='{
        "autoplay": false,
        "slidesPerView": 4,
        "slidesPerGroup": 4,
        "effect": "none",
        "loop": true,
        "pagination": {
          "el": "#related_products .products-pagination",
          "type": "bullets",
          "clickable": true
        },
        "navigation": {
          "nextEl": "#related_products .products-carousel__next",
          "prevEl": "#related_products .products-carousel__prev"
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 2,
            "slidesPerGroup": 2,
            "spaceBetween": 14
          },
          "768": {
            "slidesPerView": 3,
            "slidesPerGroup": 3,
            "spaceBetween": 24
          },
          "992": {
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "spaceBetween": 30
          }
        }
      }'>
      
      <div class="swiper-wrapper">
        @foreach($relatedProduct as $product)
        <div class="swiper-slide product-card">
          <div class="pc__img-wrapper">
            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
              <img loading="lazy" src="{{ asset($product->product_thambnail) }}" width="330" height="400" alt="{{ $product->product_name }}" class="pc__img">
            </a>
            <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
          </div>

          <div class="pc__info position-relative">
            <p class="pc__category">{{ $product->category_name }}</p>
            <h6 class="pc__title">
              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a>
            </h6>
            @if($product->discount_price == NULL)
              <div class="product-price">
                <span>TK. {{ $product->selling_price }}</span>
              </div>
            @else
              <div class="product-price">
                <span>TK. {{ $product->discount_price }}</span>
                <span class="old-price">TK. {{ $product->selling_price }}</span>
              </div>
            @endif
            <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
              <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
            </button>
          </div>
        </div><!-- /.swiper-slide -->
        @endforeach
      </div><!-- /.swiper-wrapper -->
      
    </div><!-- /.swiper-container js-swiper-slider -->

    <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
      <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
    </div><!-- /.products-carousel__prev -->
    <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
      <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
    </div><!-- /.products-carousel__next -->

    <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
  </div><!-- /.position-relative -->
</section>

    

    @endsection