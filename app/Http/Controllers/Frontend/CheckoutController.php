<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDistricts;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ShipDivision;
use App\Models\ShipState;
use App\Models\Order; // Ensure to include this if Order is used
use App\Models\OrderItem; // Ensure to include this if OrderItem is used
use App\Models\User; 
use Illuminate\Support\Facades\Log; // Ensure to include this if User is used

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id) {
        $districts = ShipDistricts::where('division_id', $division_id)
                                  ->orderBy('district_name', 'ASC')
                                  ->get();
        
        // Ensure it's returning as JSON response
        return response()->json($districts);
    }
    
    public function StateGetAjax($district_id) {
        $states = ShipState::where('district_id', $district_id)
                           ->orderBy('state_name', 'ASC')
                           ->get();
    
        // Ensure it's returning as JSON response
        return response()->json($states);
    } 

    public function CheckoutStore(Request $request){

        // Collect data
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;   
    
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes; 
    
        // Get cart total
        $cartTotal = Cart::total();
    
        // Check which payment method is selected
        if ($request->payment_option == 'bkash') {
            return view('frontend.payment.bkash', compact('data', 'cartTotal'));
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    }
    
} 
