
@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
 Store-Location::Ekobee 
@endsection

<br>

<div class="mb-4 pb-4"></div>
<section class="store-location container">
  <h2 class="page-title">STORE LOCATOR</h2>

  <div class="row">
    <div class="col-lg-4">
      <form action="https://uomo-html.flexkitux.com/Demo3/search.html" method="GET">
        <div class="store-location__search-result">
          <div class="store-location__search-result__item">
            <h5><i class="fas fa-map-marker-alt"></i> Mohammadpur, Dhaka, Bangladesh</h5>
            <p>
              <i class="fas fa-map-pin"></i> Plot 10, Road 1, Sat Masjid Housing, Mohammadpur<br>
              <i class="fas fa-city"></i> Dhaka<br>
              <i class="fas fa-phone-alt"></i> +8801828-216616<br>
              <i class="fas fa-clock"></i> 10 am - 10 pm EST, 7 days a week
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>



@endsection