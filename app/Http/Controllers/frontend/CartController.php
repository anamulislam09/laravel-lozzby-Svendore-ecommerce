<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

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



    public function addToCartQv(Request $request)
    {
        // dd($request->qty);
        // if (Auth::check()) {
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => '1',
            'options' => ['size' => $request->size, 'color' => $request->color, 'thumbnail' => $product->product_thumbnail],
        ]);
        return response()->json('Add to cart Successfully!');
        //  } else {
            // $notification = array('message' => 'Please login first !', 'alert_type' => 'error');
            // return redirect()->back()->with($notification);
        // }
    }

    public function addToCart(Request $request){
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'qty' => '1',
            'price' => $request->price,
            'weight' => '1',
            'options' => ['size' => $request->size, 'color' => $request->color, 'thumbnail' => $product->product_thumbnail],
        ]);
        return response()->json('Add to cart Successfully!');
        //  } else {
        //     $notification = array('message' => 'Please login first !', 'alert_type' => 'error');
        //     return redirect()->back()->with($notification);
        // // }
    }

    public function myCart(){
        $products = Cart::content();
        return view('frontend.cart.cart', compact('products'));
    }

    public function removeCart($id){
        $product = Cart::where('id',$id)->first()->destroy();
        // $Subcategory = Subcategory::where('id', $id)->first();
        // Cart::destroy($product);
        $notification = array('message'=>'Cart removed Successfully!','alert_type'=>'danger');
        return redirect()->back()->with($notification);
    }
}
