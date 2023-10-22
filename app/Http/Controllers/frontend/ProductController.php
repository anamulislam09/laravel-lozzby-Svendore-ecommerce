<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // show single product 
    public function productDetails($slug)
    {
        $singleProduct = Product::where('product_slug', $slug)->first();
        $Product = Product::where('product_slug', $slug)->increment('product_views');
        $reletedProduct = Product::where('subcategory_id', $singleProduct->subcategory_id)->orderBy('id', 'DESC')->limit(10)->get();
        $review = Review::where('product_id', $singleProduct->id)->orderBy('id', 'DESC')->get();
        return view('frontend.product_details', compact('singleProduct', 'reletedProduct', 'review'));
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


    public function productQuickView($id)
    {
        $product = Product::where('id', $id)->first();
        $review = Review::where('product_id', $product->id)->orderBy('id', 'DESC')->get();
        return view('frontend.product.quick_view', compact('product', 'review'));

    }
}
