<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show review 
    public function index()
    {
        $review = Review::get();
    }

    // review store  
    public function storeReview(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required '
        ]);

        $check = Review::where('user_id', Auth::id())->where('product_id', $request->product_id,)->first();
        if ($check) {
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


    // Add product to wishlist 
    public function AddWishlist($id)
    {
        if (Auth::check()) {


            // $check = DB::table('wishlists')->where('product_id',$id)->where('user_id', Auth::id())->first();
            $check = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
            if ($check) {
                $notification = array('message' => 'Already have it on your wishlist !', 'alert_type' => 'error');
                return redirect()->back()->with($notification);
            } else {
                // $data=array();
                // $data['product_id'] = $id;
                // $data['user_id'] = Auth::id();
                // DB::table('wishlists')->insert($data);

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $id
                ]);

                $notification = array('message' => 'Product added on wishlist !', 'alert_type' => 'success');
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array('message' => 'Please login first !', 'alert_type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
