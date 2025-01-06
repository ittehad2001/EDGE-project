@section('title')
    Featured Products::Ekobee 
@endsection

@php
$featured = App\Models\Product::where('featured',1)->orderBy('id','DESC')->get();
@endphp

<section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Featured Products</h2>
    @foreach($featured as $product)
    <div class="row">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                        <img loading="lazy" src="{{ asset( $product->product_thambnail ) }}" width="330" height="400" alt="{{ $product->product_name }}" class="pc__img">
                    </a>
                    @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount / $product->selling_price) * 100;
                    @endphp

                    @if($product->discount_price == NULL)
                    <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2"></div>
                    @else
                    <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2">{{ round($discount) }} %</div>
                    @endif
                </div>

                <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h6>

                    @if($product->discount_price == NULL)
                    <span class="money price-old">Tk. {{ $product->selling_price }}</span>
                    @else
                    <span class="money price-old">Tk.{{ $product->selling_price }} </span> 
                    <span class="money price text-secondary">Tk.{{ $product->discount_price }}</span>
                    @endif
                </div>

                <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view" id="{{ $product->id }}" onclick="productView(this.id)">
                        <span class="d-none d-xxl-block">Quick View</span>
                        <span class="d-block d-xxl-none"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_view" /></svg></span>
                    </button>
                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"  >
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="text-center mt-2">
        <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop2.html">Load More</a>
    </div>
</section>
