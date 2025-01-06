
@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<footer class="footer footer_type_2">
    <div class="footer-top container">
      <div class="block-newsletter">
        <h3 class="block__title">Stay Touched With Us</h3>
        <p>Be the first to get the latest news about trends, promotions, and much more!</p>
        <form action="https://uomo-html.flexkitux.com/Demo3/index.html" class="block-newsletter__form">
          <input class="form-control" type="email" name="email" placeholder="Your email address">
          <a class="btn btn-secondary fw-medium" type="submit">JOIN</a>
        </form>
      </div>
    </div><!-- /.footer-top container -->

    <div class="footer-middle container">
      <div class="row row-cols-lg-5 row-cols-2">
        <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
          <div class="logo">
            <a href="index.html">
              <img src="{{ asset($setting->logo ) }}" alt="Uomo" class="logo__image d-block">
            </a>
          </div><!-- /.logo -->
          <p class="footer-address">{{ $setting->company_address }} </p>

          <p class="m-0">
            <strong class="fw-medium">{{ $setting->email }}</strong>
          </p>
          <p>
            <strong class="fw-medium">{{ $setting->phone_one }}</strong>
          </p>

          <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
            <li>
              <a href="{{ $setting->facebook }}" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg"><use href="#icon_facebook" /></svg>
              </a>
            </li>
          
            <li>
              <a href="{{ $setting->twitter }}" class="footer__social-link d-block">
                <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><use href="#icon_instagram" /></svg>
              </a>
            </li>
            
           
          </ul>
        </div><!-- /.footer-column -->

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Company</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="{{route('about')}}" class="menu-link menu-link_us-s">About Us</a></li>
            <li class="sub-menu__item"><a href="{{route('contact')}}" class="menu-link menu-link_us-s">Contact Us</a></li>
          </ul>
        </div><!-- /.footer-column -->

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Shop</h6>
          <ul class="sub-menu__list list-unstyled">
          
            <li class="sub-menu__item"><a href="{{route('shop.product')}}" class="menu-link menu-link_us-s">Shops</a></li>
          </ul>
        </div><!-- /.footer-column -->

        <div class="footer-column footer-menu mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Help</h6>
          <ul class="sub-menu__list list-unstyled">
            <li class="sub-menu__item"><a href="{{route('contact')}}" class="menu-link menu-link_us-s">Customer Service</a></li>
            <li class="sub-menu__item"><a href="{{route('dashboard')}}" class="menu-link menu-link_us-s">My Account</a></li>
            <li class="sub-menu__item"><a href="{{route('store.location')}}" class="menu-link menu-link_us-s">Find a Store</a></li>
            <li class="sub-menu__item"><a href="{{route('term.condition')}} class="menu-link menu-link_us-s">Legal & Privacy</a></li>
            <li class="sub-menu__item"><a href="{{route('contact')}}" class="menu-link menu-link_us-s">Contact</a></li>
           
          </ul>
        </div><!-- /.footer-column -->

        <div class="footer-column mb-4 mb-lg-0">
          <h6 class="sub-menu__title text-uppercase">Opening Time</h6>
          <ul class="list-unstyled">
            <li><span class="menu-link"> 24/7days</span></li>
            
          </ul>
        </div><!-- /.footer-column -->
      </div><!-- /.row-cols-5 -->
    </div><!-- /.footer-middle container -->

    <div class="footer-bottom">
      <div class="container d-md-flex align-items-center">
        <span class="footer-copyright me-auto"><p>&copy; {{ $setting->copyright }}</span>
        
      </div><!-- /.container d-flex align-items-center -->
    </div><!-- /.footer-bottom container -->
  </footer>

  <!-- Mobile Fixed Footer -->
  <footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
    <div class="row text-center">
      <div class="col-4">
        <a href="{{'/'}}"  class="footer-mobile__link d-flex flex-column align-items-center">
          <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_home" /></svg>
          <span>Home</span>
        </a>
      </div><!-- /.col-3 -->

      <div class="col-4">
        <a href="{{route('shop.product')}}" class="footer-mobile__link d-flex flex-column align-items-center">
          <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_hanger" /></svg>
          <span>Shop</span>
        </a>
      </div><!-- /.col-3 -->

      <div class="col-4">
        <a href="{{ route('wishlist') }}" class="footer-mobile__link d-flex flex-column align-items-center">
          <div class="position-relative">
            <svg class="d-block" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
            <span class="wishlist-amount d-block position-absolute js-wishlist-count">3</span>
          </div>
          <span>Wishlist</span>
        </a>
      </div><!-- /.col-3 -->
    </div><!-- /.row -->
  </footer>