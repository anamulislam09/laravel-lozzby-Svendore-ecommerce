<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
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

    public function productQuickView($id)
    {
        $product = Product::where('id', $id)->first();
        $review = Review::where('product_id', $product->id)->orderBy('id', 'DESC')->get();
        return view('frontend.product.quick_view', compact('product', 'review'));

    }

    // show product under category wise 
    public function catProduct($id){
        $Subcategory = Subcategory::where('id', $id)->first();
        $product = Product::where('subcategory_id', $id)->get();
        return view('frontend.product.products', compact('product','Subcategory'));
    }
}
