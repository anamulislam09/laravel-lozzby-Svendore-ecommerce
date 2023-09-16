<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // show review 
    public function index(){
        $review = Review::get();
    }
    
    // review store  
    public function storeReview(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required '
        ]);

        $check=Review::where('user_id', Auth::id())->where('product_id', $request->product_id,)->first();
        if($check){
            $notification = array('message' => 'Already you a have review of this product !', 'alert_type' => 'error');
            return redirect()->back()->with($notification);
        }

        Review::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'review' => $request->review,
            'rating' => $request->rating,
            'review_date' => date('Y-m-Y'),
            'review_month' => date('F'),
            'review_year' => date('Y'),
            
        ]);
        $notification = array('message' => 'Thanks for your review !', 'alert_type' => 'success');
        return redirect()->back()->with($notification);
    }

}
