<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function StoreReview(Request $request)
{
    // Ensure user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'You need to login first.');
    }

    $request->validate([
        'comment' => 'required',
        'quality' => 'required|integer|min:1|max:5', // Ensure rating is provided
    ]);

    $product = $request->product_id;
    $vendor = $request->hvendor_id;

    // Insert review into the database
    Review::create([
        'product_id' => $product,
        'user_id' => Auth::id(),
        'comment' => $request->comment,
        'rating' => $request->quality,
        'created_at' => Carbon::now(),
    ]);

    // Success notification
    $notification = [
        'message' => 'Review has been submitted and will be approved by the admin.',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification); 
}

    public function PendingReview(){
        $review = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('backend.review.pending_review',compact('review'));
    }// End Method 
    public function ReviewApprove($id){
        Review::where('id',$id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 

    }// End Method 

     public function PublishReview(){

        $review = Review::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.review.publish_review',compact('review'));

    }// End Method 


    public function ReviewDelete($id){

        Review::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 

}
