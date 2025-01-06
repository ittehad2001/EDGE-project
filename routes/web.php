<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\StripController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [UserController::class, 'Index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    Route::get('/user/order/page' , [UserController::class,'UserOrderPage'])->name('user.order.page');
    Route::get('/user/order_details/{order_id}' ,[UserController::class, 'UserOrderDetails']);
    Route::post('/return/order/{order_id}' , [UserController::class,'ReturnOrder'])->name('return.order');
    Route::get('/return/order/page' , [UserController::class,'ReturnOrderPage'])->name('return.order.page');
    Route::get('/user/track/order' , [UserController::class,'UserTrackOrder'])->name('user.track.order');
    Route::post('/order/tracking' ,[UserController::class, 'OrderTracking'])->name('order.tracking');
    Route::get('/user/invoice_download/{order_id}' ,[UserController::class, 'UserOrderInvoice']);
});

require __DIR__.'/auth.php';
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
Route::get('/store/location' , [IndexController::class,'StoreLocation'])->name('store.location');
Route::get('/term/condition' , [IndexController::class,'Terms'])->name('term.condition');
Route::get('/faq' , [IndexController::class,'Faq'])->name('faq');
Route::get('/about' , [IndexController::class,'About'])->name('about');
Route::get('/contact' , [IndexController::class,'Contact'])->name('contact');
Route::post('/store/contact' , [IndexController::class,'StoreContact'])->name('store.contact');
Route::get('/shop/product', [IndexController::class, 'ShopProduct'])->name('shop.product');

Route::middleware(['auth','roles:admin'])->group(function() {


    // Brand All Route
   Route::controller(BrandController::class)->group(function(){
       Route::get('/all/brand' , 'AllBrand')->name('all.brand');
       Route::get('/add/brand' , 'AddBrand')->name('add.brand');
       Route::post('/store/brand' , 'StoreBrand')->name('store.brand');
       Route::get('/edit/brand/{id}' , 'EditBrand')->name('edit.brand');
       Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
       Route::get('/delete/brand/{id}' , 'DeleteBrand')->name('delete.brand');
   });

   //Category All Route
   Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category' , 'AllCategory')->name('all.category');
    Route::get('/add/category' , 'AddCategory')->name('add.category');
    Route::post('/store/category' , 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
    Route::post('/update/category' , 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');
  });

   // Product All Route
   Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' , 'AllProduct')->name('all.product');
    Route::get('/add/product' , 'AddProduct')->name('add.product');
    Route::post('/store/product' , 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
    Route::post('/update/product' , 'UpdateProduct')->name('update.product');
    Route::post('/update/product/thambnail' , 'UpdateProductThambnail')->name('update.product.thambnail');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');
    Route::get('/product/stock' , 'ProductStock')->name('product.stock');
   });

   Route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider' , 'AllSlider')->name('all.slider');
    Route::get('/add/slider' , 'AddSlider')->name('add.slider');
    Route::post('/store/slider' , 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}' , 'EditSlider')->name('edit.slider');
    Route::post('/update/slider' , 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}' , 'DeleteSlider')->name('delete.slider');
   });

   // Banner All Route
   Route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner' , 'AllBanner')->name('all.banner');
    Route::get('/add/banner' , 'AddBanner')->name('add.banner');
    Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}' , 'EditBanner')->name('edit.banner');
    Route::post('/update/banner' , 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}' , 'DeleteBanner')->name('delete.banner');
});

    // Shipping Division All Route
    Route::controller(ShippingAreaController::class)->group(function(){
        Route::get('/all/division' , 'AllDivision')->name('all.division');
        Route::get('/add/division' , 'AddDivision')->name('add.division');
        Route::post('/store/division' , 'StoreDivision')->name('store.division');
        Route::get('/edit/division/{id}' , 'EditDivision')->name('edit.division');
        Route::post('/update/division' , 'UpdateDivision')->name('update.division');
        Route::get('/delete/division/{id}' , 'DeleteDivision')->name('delete.division');
    });


     // Shipping District All Route
     Route::controller(ShippingAreaController::class)->group(function(){
        Route::get('/all/district' , 'AllDistrict')->name('all.district');
        Route::get('/add/district' , 'AddDistrict')->name('add.district');
        Route::post('/store/district' , 'StoreDistrict')->name('store.district');
        Route::get('/edit/district/{id}' , 'EditDistrict')->name('edit.district');
        Route::post('/update/district' , 'UpdateDistrict')->name('update.district');
        Route::get('/delete/district/{id}' , 'DeleteDistrict')->name('delete.district');
    });

    // Shipping State All Route
    Route::controller(ShippingAreaController::class)->group(function(){
        Route::get('/all/state' , 'AllState')->name('all.state');
        Route::get('/add/state' , 'AddState')->name('add.state');
        Route::post('/store/state' , 'StoreState')->name('store.state');
        Route::get('/edit/state/{id}' , 'EditState')->name('edit.state');
        Route::post('/update/state' , 'UpdateState')->name('update.state');
        Route::get('/delete/state/{id}' , 'DeleteState')->name('delete.state');
        Route::get('/district/ajax/{division_id}' , 'GetDistrict');
    });

    // Coupon All Route
    Route::controller(CouponController::class)->group(function(){
        Route::get('/all/coupon' , 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon' , 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon' , 'StoreCoupon')->name('store.coupon');
        Route::get('/edit/coupon/{id}' , 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon' , 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}' , 'DeleteCoupon')->name('delete.coupon');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('/pending/order' , 'PendingOrder')->name('pending.order');
        Route::get('/admin/order/details/{order_id}' , 'AdminOrderDetails')->name('admin.order.details');
        Route::get('/admin/confirmed/order' , 'AdminConfirmedOrder')->name('admin.confirmed.order');
        Route::get('/admin/processing/order' , 'AdminProcessingOrder')->name('admin.processing.order');
        Route::get('/admin/delivered/order' , 'AdminDeliveredOrder')->name('admin.delivered.order');
        Route::get('/pending/confirm/{order_id}' , 'PendingToConfirm')->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}' , 'ConfirmToProcess')->name('confirm-processing');
        Route::get('/processing/delivered/{order_id}' , 'ProcessToDelivered')->name('processing-delivered');
        Route::get('/admin/invoice/download/{order_id}' , 'AdminInvoiceDownload')->name('admin.invoice.download');
    });

    Route::controller(ReturnController::class)->group(function(){
        Route::get('/return/request' , 'ReturnRequest')->name('return.request');
        Route::get('/return/request/approved/{order_id}' , 'ReturnRequestApproved')->name('return.request.approved');
        Route::get('/complete/return/request' , 'CompleteReturnRequest')->name('complete.return.request');
        Route::get('/contact/message' , 'ContactMessage')->name('contact.message');

    });

    // Report All Route
    Route::controller(ReportController::class)->group(function(){
        Route::get('/report/view' , 'ReportView')->name('report.view');
        Route::post('/search/by/date' , 'SearchByDate')->name('search-by-date');
        Route::post('/search/by/month' , 'SearchByMonth')->name('search-by-month');
       Route::post('/search/by/year' , 'SearchByYear')->name('search-by-year');
       Route::get('/order/by/user' , 'OrderByUser')->name('order.by.user');
    Route::post('/search/by/user' , 'SearchByUser')->name('search-by-user');
    });

    Route::controller(SiteSettingController::class)->group(function(){
        Route::get('/site/setting' , 'SiteSetting')->name('site.setting');
        Route::post('/site/setting/update' , 'SiteSettingUpdate')->name('site.setting.update');
        Route::get('/seo/setting' , 'SeoSetting')->name('seo.setting');
        Route::post('/seo/setting/update' , 'SeoSettingUpdate')->name('seo.setting.update');

       });

       Route::controller(ReviewController::class)->group(function(){

        Route::get('/pending/review' , 'PendingReview')->name('pending.review');
        Route::get('/review/approve/{id}' , 'ReviewApprove')->name('review.approve');
        Route::get('/publish/review' , 'PublishReview')->name('publish.review');
        Route::get('/review/delete/{id}' , 'ReviewDelete')->name('review.delete');
       });

       Route::controller(SiteSettingController::class)->group(function(){
        Route::get('/smtp/setting','SmtpSetting')->name('smtp.setting');
        Route::post('/update/smtp','SmtpUpdate')->name('update.smtp');

    });


   }); // End Middleware

  Route::get('/product/category/{id}/{slug}', [IndexController::class, 'CatWiseProduct']);
  Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
  Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
  Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
  Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
  Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
  Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);
  Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);
  Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
  Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
  Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

  Route::controller(IndexController::class)->group(function(){
    Route::post('/search' , 'ProductSearch')->name('product.search');
    Route::post('/search-product' , 'SearchProduct');
   });

 // Cart All Route
 Route::controller(CartController::class)->group(function(){
    Route::get('/mycart' , 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');
    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');

});

/// User All Route
Route::middleware(['auth','roles:user'])->group(function() {
 // Wishlist All Route
Route::controller(WishlistController::class)->group(function(){
    Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
    Route::get('/get-wishlist-product' , 'GetWishlistProduct');
    Route::get('/wishlist-remove/{id}' , 'WishlistRemove');
});

 Route::controller(CheckoutController::class)->group(function(){
    Route::get('/district-get/ajax/{division_id}', 'DistrictGetAjax');
    Route::get('/state-get/ajax/{district_id}', 'StateGetAjax');
    Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');
});

Route::controller(StripController::class)->group(function(){
    Route::post('/cash/order' , 'CashOrder')->name('cash.order');
});

});

Route::controller(ReviewController::class)->group(function(){
    Route::post('/store/review' , 'StoreReview')->name('store.review');
});

    Route::get('auth/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);
});
