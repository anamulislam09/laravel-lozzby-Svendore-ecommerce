<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    
      // Add product to wishlist 
      public function AddWishlist($id)
      {
          if(Auth::check()){
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
          }else{
              $notification = array('message' => 'Please login first !', 'alert_type' => 'error');
              return redirect()->back()->with($notification);
          }
      }
}
