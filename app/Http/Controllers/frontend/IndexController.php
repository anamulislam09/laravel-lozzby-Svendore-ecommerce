<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $category = Category::all();
        $bannerproduct = Product::where('product_slider', 1)->latest()->first();
        return view('frontend.index', compact('category','bannerproduct'));
    }

    // show single product 

    public function productDetails($slug){
        $singleProduct = Product::where('product_slug',$slug)->first(); 
        $reletedProduct = Product::where('subcategory_id',$singleProduct->subcategory_id)->orderBy('id','DESC')->limit(10)->get(); 
        $review = Review::where('product_id',$singleProduct->id)->get();
        return view('frontend.product_details',compact('singleProduct','reletedProduct','review'));
    }


    public function logout(){
        Auth()->logout();
        $notification = array('message'=>'You are logout out','alert_type'=>'success');
        return redirect()->back()->with($notification);
    }

}
