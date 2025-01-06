<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDistrict;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\ShipDivision;
use App\Models\ShipState;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method

    public function AddMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));
    }// End Method



    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }// End Method

    public function AddToCartDetails(Request $request, $id){

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method


    public function MyCart() {
        return view('frontend.mycart.view_mycart');
    }
    
    public function GetCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));

    }// End Method

    public function CartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }// End Method
        
    public function CartIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);

        return response()->json('Increment');

    }// End Method

    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);
        return response()->json('Decrement');
    }// End Method

    
    public function CouponApply(Request $request){

        // Fetch the coupon based on the name and validity
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
                        ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
                        ->first();
    
        if ($coupon) {
            // Calculate the coupon discount
            $discount_amount = round(Cart::total() * $coupon->coupon_discount / 100);
            $total_after_discount = round(Cart::total() - $discount_amount);
    
            // Determine the delivery fee based on the location
            $delivery_fee = 0;
            if ($request->delivery_location == 'inside_dhaka') {
                $delivery_fee = 80;
            } elseif ($request->delivery_location == 'outside_dhaka') {
                $delivery_fee = 150;
            }
    
            // Calculate the total amount after applying the coupon and adding the delivery fee
            $total_amount_with_delivery = $total_after_discount + $delivery_fee;
    
            // Store coupon details in the session
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $discount_amount,
                'total_amount' => $total_amount_with_delivery, // Total including delivery fee
                'delivery_fee' => $delivery_fee // Storing delivery fee for reference
            ]);
    
            return response()->json([
                'validity' => true,
                'success' => 'Coupon Applied Successfully',
                'discount_amount' => $discount_amount,
                'total_amount' => $total_amount_with_delivery,
                'delivery_fee' => $delivery_fee
            ]);
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
    public function CouponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);

    }// End Method    
    
    public function CouponCalculation(Request $request){

        // Set delivery fee based on location (inside or outside Dhaka)
        $delivery_fee = 0;
        if ($request->delivery_location == 'inside_dhaka') {
            $delivery_fee = 80;
        } elseif ($request->delivery_location == 'outside_dhaka') {
            $delivery_fee = 150;
        }
    
        // Calculate total with or without coupon
        if (Session::has('coupon')) {
            $subtotal = Cart::total();
            $discount_amount = session()->get('coupon')['discount_amount'];
            $total_amount = session()->get('coupon')['total_amount'] + $delivery_fee;
    
            return response()->json(array(
                'subtotal' => $subtotal,
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => $discount_amount,
                'delivery_fee' => $delivery_fee,
                'total_amount' => $total_amount
            ));
        } else {
            $subtotal = Cart::total();
            $total_amount = Cart::total() + $delivery_fee;
    
            return response()->json(array(
                'subtotal' => $subtotal,
                'delivery_fee' => $delivery_fee,
                'total_amount' => $total_amount
            ));
        }
    }
    
    
    public function CheckoutCreate(){

        if (Auth::check()) {

            if (Cart::total() > 0) { 

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();

        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));



            }else{

            $notification = array(
            'message' => 'Shopping At list One Product',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification); 
            }



        }else{

             $notification = array(
            'message' => 'You Need to Login First',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification); 
        }




    }// End Method


}

