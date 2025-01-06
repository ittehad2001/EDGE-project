<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Multi_img;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function ProductDetails($id,$slug){
        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);
        $multiImage = Multi_img::where('product_id',$id)->get();
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('frontend.home.product_details',compact('product','product_color','product_size','multiImage','relatedProduct'));

     } // End Method 
    
    
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(

         'product' => $product,
         'color' => $product_color,
         'size' => $product_size,

        ));

     }// End Method 

     public function CatWiseProduct(Request $request, $id, $slug) {
        $products = Product::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $breadcat = Category::where('id',$id)->first();

        return view('frontend.home.category_view', compact('products', 'categories','breadcat'));
    }
     
    public function ProductSearch(Request $request){

        $request->validate(['search' => "required"]);

        $item = $request->search;
        $categories = Category::orderBy('category_name','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.home.search',compact('products','item','categories','newProduct'));

    }// End Method 

    public function SearchProduct(Request $request){

        $request->validate(['search' => "required"]);
 
         $item = $request->search;
         $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_slug','product_thambnail','selling_price','id')->limit(6)->get();
 
         return view('frontend.home.search_product',compact('products'));
 
      }// End Method 

      public function StoreLocation(){
 
         return view('frontend.body.store_location');
 
      }// End Method 


      public function Terms(){
 
        return view('frontend.body.terms_condition');

     }// End Method 


     public function Faq(){
 
        return view('frontend.body.faq');

     }// End Method 

     public function About(){
 
        return view('frontend.body.about');

     }// End Method 

     public function Contact(){
 
        return view('frontend.body.contact');

     }// End Method 

     public function ShopProduct()
     {
         // Retrieve all categories and products
         $categories = Category::all();
         $products = Product::all();
         
         // Assuming you're passing the first category as breadcrumb
         $breadcat = Category::first();
 
         // Return view with categories, products, and breadcrumb category
         return view('frontend.home.shop_product', compact('categories', 'products', 'breadcat'));
     }

     public function StoreContact(Request $request)
     {
         // Validate the request to ensure 'name', 'email', and 'message' fields are filled
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email',
             'message' => 'required|string',
         ]);
     
         // Insert the validated data into the 'contacts' table
         Contact::create([
             'name' => $request->name,
             'email' => $request->email,
             'message' => $request->message,
             'created_at' => Carbon::now(),
         ]);
     
         // Prepare the notification message
         $notification = array(
             'message' => 'Your message was sent successfully',
             'alert-type' => 'success'
         );
     
         // Redirect back with notification
         return redirect()->back()->with($notification);
     }
     

}
