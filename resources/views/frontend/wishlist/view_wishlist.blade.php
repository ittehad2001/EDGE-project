@extends('frontend.master_dashboard')

@section('frontend')


@section('title')
   Wishlist::Ekobee 
@endsection


<div class="mb-4 pb-4"></div>
<section class="my-account container">
    <h2 class="page-title">Wishlist</h2>
    <div class="row">
        <div class="col-lg-3">
            <ul class="account-nav">
            <li><a href="account_dashboard.html" class="menu-link menu-link_us-s">Dashboard</a></li>
            @include('frontend.dashboard.user_sidebar')
            </ul>
        </div>
        
        <div class="col-lg-9">
            <div class="page-content my-account__wishlist">
                <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                    <!-- Products will be dynamically injected here -->
                    <table class="table table-bordered">
                    <tbody id="wishlist">
                            <!-- Wishlist items will be loaded here by JavaScript -->
                        </tbody>
                    </table>
                </div><!-- /.products-grid row -->
            </div>
        </div>
    </div>
</section>
@endsection

<style>
#wishlist {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

#wishlist th, #wishlist td {
    padding: 15px;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #ddd;
    font-size: 16px;
}

#wishlist th {
    background-color: #f8f8f8;
    font-weight: bold;
    text-transform: uppercase;
}

#wishlist tr:hover {
    background-color: #f1f1f1;
}

#wishlist img {
    width: 100px;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
}

#wishlist .text-brand {
    color: #e84e0f;
    font-weight: bold;
    font-size: 18px;
}

#wishlist .in-stock {
    color: #28a745;
    font-weight: bold;
}

#wishlist .out-stock {
    color: #dc3545;
    font-weight: bold;
}

@media (max-width: 768px) {
    #wishlist th, #wishlist td {
        font-size: 14px;
        padding: 10px;
    }

    #wishlist img {
        width: 70px;
    }
}

</style>


