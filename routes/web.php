<?php

use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\ReviewController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::get('/login', function () {
    // return redirect()->to('');
    return redirect()->back();
})->name('login');

// Route::get('/register', function(){
//     return redirect()->to('/');
// })->name('register');

Route::get('/logout', [IndexController::class, 'logout'])->name('customer.logout');

// frontend route start here
Route::group([], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // review route 
    Route::post('store/review', [ReviewController::class, 'storeReview'])->name('store.review');;

    // product details route
    Route::get('product/product-details/{slug}', [ProductController::class, 'productDetails'])->name('product.product_details');

    // wishlist route 
    Route::get('add/wishlist/{id}', [CartController::class, 'AddWishlist'])->name('add.wishlist');

    // product quick view route 
    Route::get('product_quick_view/{id}', [ProductController::class, 'productQuickView']);

    //Cart
    Route::post('addToCartQv', [CartController::class, 'addToCartQv'])->name('addToCartQv');
    Route::post('addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('my-cart', [CartController::class, 'myCart'])->name('cart');  //show all cart 
    Route::get('remove-cart/{id}', [CartController::class, 'removeCart'])->name('removeCart');  //removed all cart 

    // show product under category wise 
    Route::get('category/{id}', [ProductController::class, 'catProduct'])->name('category.products');
});
