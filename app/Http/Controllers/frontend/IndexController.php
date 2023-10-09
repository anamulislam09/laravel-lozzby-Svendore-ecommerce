<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $category = Category::all();
        $bannerproduct = Product::where('product_slider', 1)->latest()->first();
        $featured = Product::where('status', 1)->where('featured', 1)->orderBy('id','DESC')->limit(5)->get();
        $popular = Product::where('status', 1)->orderBy('product_views','DESC')->limit(5)->get();
        $trendy = Product::where('status', 1)->where('trendy', 1)->orderBy('product_views','DESC')->limit(5)->get();

        return view('frontend.index', compact('category','bannerproduct','featured' ,'popular' , 'trendy'));
    }

    // show single product 

    public function productDetails($slug){
        $singleProduct = Product::where('product_slug',$slug)->first(); 
        $Product = Product::where('product_slug',$slug)->increment('product_views'); 
        $reletedProduct = Product::where('subcategory_id',$singleProduct->subcategory_id)->orderBy('id','DESC')->limit(10)->get(); 
        $review = Review::where('product_id',$singleProduct->id)->orderBy('id','DESC')->get();
        return view('frontend.product_details',compact('singleProduct','reletedProduct','review'));
    }


    public function logout(){
        Auth()->logout();
        $notification = array('message'=>'You are logout out','alert_type'=>'danger');
        return redirect()->back()->with($notification);
    }

}
