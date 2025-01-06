
@php
  $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
@endphp

<div class="header-mobile header_sticky">
    <div class="container d-flex align-items-center h-100">
      <a class="mobile-nav-activator d-block position-relative" href="#">
        <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg"><use href="#icon_nav" /></svg>
        <span class="btn-close-lg position-absolute top-0 start-0 w-100"></span>
      </a>

      @php
      $setting = App\Models\SiteSetting::find(1);
      @endphp

      <div class="logo">
        <a href="index.html">
          <img src="{{ asset($setting->logo)   }}" alt="Uomo" class="logo__image d-block">
        </a>
      </div><!-- /.logo -->

      <a href="#" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_cart" /></svg>
        <span class="cart-amount d-block position-absolute js-cart-items-count"></span>
      </a>
    </div><!-- /.container -->

    <nav class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
      <div class="container">
        <form action="https://uomo-html.flexkitux.com/Demo3/search.html" method="GET" class="search-field position-relative mt-4 mb-3">
          <div class="position-relative">
            <input class="search-field__input w-100 border rounded-1" type="text" name="search-keyword" placeholder="Search products">
            <a class="btn-icon search-popup__submit pb-0 me-2" type="submit">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_search" /></svg>
            </a>
            <a class="btn-icon btn-close-lg search-popup__reset pb-0 me-2" type="reset"></a>
          </div>

          <div class="position-absolute start-0 top-100 m-0 w-100">
            <div class="search-result"></div>
          </div>
        </form><!-- /.header-search -->
      </div><!-- /.container -->



      <div class="container">
        <div class="overflow-hidden">
          <ul class="navigation__list list-unstyled position-relative">
            <li class="navigation__item">
              <a href="{{'/'}}" class="navigation__link js-nav-right d-flex align-items-center">Home</a>

              <li class="navigation__item">
      <a href="{{route('shop.product')}}" class="navigation__link js-nav-right d-flex align-items-center">Shop</a>
     </li>

            <li class="navigation__item">
              <a href="#" class="navigation__link">Category</a>
              <ul class="default-menu list-unstyled">
              @foreach($categories as $category)
                <li class="sub-menu__item"><a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}" class="menu-link menu-link_us-s">{{ $category->category_name }} </a></li>
              @endforeach
              </ul><!-- /.box-menu -->
            </li>

            <li class="navigation__item">
              <a href="#" class="navigation__link js-nav-right d-flex align-items-center">Pages<svg class="ms-auto" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></a>
              <div class="sub-menu position-absolute top-0 start-100 w-100 d-none">
                <a href="#" class="navigation__link js-nav-left d-flex align-items-center border-bottom mb-2"><svg class="me-2" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg>Pages</a>
                <ul class="list-unstyled">
                  <li class="sub-menu__item"><a href="{{ route('login') }}" class="menu-link menu-link_us-s">Login / Register</a></li>
                  <li class="sub-menu__item"><a href="{{route('store.location')}}"  class="menu-link menu-link_us-s">Store Locator</a></li>

                  <li class="sub-menu__item"><a href="{{route('faq')}}" class="menu-link menu-link_us-s">Faq</a></li>
                  <li class="sub-menu__item"><a href="{{route('term.condition')}}" class="menu-link menu-link_us-s">Terms</a></li>


                </ul>
              </div>
            </li>

            <li class="navigation__item">
              <a href="{{route('about')}}" class="navigation__link">About</a>
            </li>

            <li class="navigation__item">
              <a href="{{route('contact')}}" class="navigation__link">Contact</a>
            </li>
          </ul><!-- /.navigation__list -->
        </div><!-- /.overflow-hidden -->
      </div><!-- /.container -->

      <div class="border-top mt-auto pb-2">
        <div class="customer-links container mt-4 mb-2 pb-1">
          <svg class="d-inline-block align-middle" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_user" /></svg>
          <span class="d-inline-block ms-2 text-uppercase align-middle fw-medium"><a href="{{route('dashboard')}}">My Account</a> </span>
        </div>

        <ul class="container social-links list-unstyled d-flex flex-wrap mb-0">
          <li>
            <a href="https://www.facebook.com/" class="footer__social-link d-block ps-0">
              <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg"><use href="#icon_facebook" /></svg>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><use href="#icon_instagram" /></svg>
            </a>
          </li>


        </ul>
      </div>
    </nav><!-- /.navigation -->
  </div><!-- /.header-mobile -->



  @php
    $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
  @endphp


  @php
    $setting = App\Models\SiteSetting::find(1);
  @endphp

  <!-- Header Type 2 -->
  <header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
      <div class="header-desk header-desk_type_1">
        <div class="logo">
          <a href="index.html">
            <img src="{{ asset($setting->logo)   }}" alt="Uomo" class="logo__image d-block" style="height: 28px; width: 128px;">
          </a>
        </div><!-- /.logo -->

        <nav class="navigation">
          <ul class="navigation__list list-unstyled d-flex">
            <li class="navigation__item">
              <a href="{{'/'}}" class="navigation__link">Home</a>
              <!-- /.box-menu -->
            </li>
            <li class="navigation__item">
      <a href="{{route('shop.product')}}" class="navigation__link js-nav-right d-flex align-items-center">Shop</a>
     </li>

            <li class="navigation__item">
              <a href="#" class="navigation__link">Category</a>
              <ul class="default-menu list-unstyled">
                  @foreach($categories as $category)
                      <li class="sub-menu__item">
                          <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}" class="menu-link menu-link_us-s">
                              {{ $category->category_name }}
                          </a>
                      </li>
                  @endforeach
              </ul>
          </li>


            <li class="navigation__item">
              <a href="#" class="navigation__link">Pages</a>
              <ul class="default-menu list-unstyled">
                <li class="sub-menu__item"><a href="{{route('dashboard')}}" class="menu-link menu-link_us-s">My Account</a></li>
                <li class="sub-menu__item"><a href="{{ route('login') }}" class="menu-link menu-link_us-s">Login / Register</a></li>
                <li class="sub-menu__item"><a href="{{route('store.location')}}" class="menu-link menu-link_us-s">Store Locator</a></li>
                <li class="sub-menu__item"><a href="{{route('faq')}}" class="menu-link menu-link_us-s">Faq</a></li>
                <li class="sub-menu__item"><a href="{{route('term.condition')}}" class="menu-link menu-link_us-s">Terms</a></li>
              </ul><!-- /.box-menu -->
            </li>


            <li class="navigation__item">
              <a href="{{route('about')}}" class="navigation__link">About</a>
            </li>
            <li class="navigation__item">
              <a href="{{route('contact')}}" class="navigation__link">Contact</a>
            </li>
          </ul><!-- /.navigation__list -->
        </nav><!-- /.navigation -->

        <div class="header-tools d-flex align-items-center">
          <div class="header-tools__item hover-container">
            <div class="js-hover__open position-relative">
              <a class="js-search-popup search-field__actor" href="#">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_search" /></svg>
                <i class="btn-icon btn-close-lg"></i>
              </a>
            </div>

            <div class="search-popup js-hidden-content">
              <form action="{{ route('product.search') }}" method="POST" class="search-field container">
              @csrf
                <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                <div class="position-relative">
                  <input class="search-field__input search-popup__input w-100 fw-medium" onfocus="search_result_show()" onblur="search_result_hide()" name="search" id="search" placeholder="Search for items..." >
                  <a class="btn-icon search-popup__submit" type="submit">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_search" /></svg>
                  </a>
                  <a class="btn-icon btn-close-lg search-popup__reset" type="reset"></a>
                </div>
                <style>
    #searchProducts{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>

<script>
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
    function search_result_hide(){
        $("#searchProducts").slideUp();
    }
</script>


                  <div class="search-result row row-cols-5"></div>
                </div>
              </form><!-- /.header-search -->
            </div><!-- /.search-popup -->
          </div><!-- /.header-tools__item hover-container -->
@auth
          <div class="header-tools__item hover-container">
            <a class="header-tools__item " href="{{route('dashboard')}}" data-aside="customerForms">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_user" /></svg>
  </a>      <label>Dashboard</label>
          </div>

          <div class="header-tools__item hover-container">
            <a class="header-tools__item " href="{{route('user.logout')}}"  data-aside="customerForms">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_user" /></svg>
            </a>     <label>Logout</label>
          </div>
@else

<div class="header-tools__item hover-container">
            <a class="header-tools__item " href="{{route('login')}}" data-aside="customerForms">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_user" /></svg>
            </a> <label>LogIn</label>
          </div>

          <div class="header-tools__item hover-container">
            <a class="header-tools__item " href="{{route('user.logout')}}" data-aside="customerForms">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_user" /></svg>
            </a>   <label>Logout</label>
          </div>

  @endauth

          <a class="header-tools__item" href="{{ route('wishlist') }}">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
          </a>

          <a href="{{ route('mycart') }}" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer" >
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_cart" /></svg>
            <span class="cart-amount d-block position-absolute js-cart-items-count" id="cartQty"> </span>
          </a>


        </div><!-- /.header__tools -->
      </div><!-- /.header-desk header-desk_type_1 -->
    </div><!-- /.container -->

    </header>

