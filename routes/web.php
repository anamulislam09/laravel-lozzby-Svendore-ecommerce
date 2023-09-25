<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\ReviewController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/login', function(){
    // return redirect()->to('');
    return redirect()->back();
})->name('login');

Route::get('/register', function(){
    return redirect()->to('/');
})->name('register');

Route::get('/logout', [IndexController::class, 'logout'])->name('customer.logout');

// frontend route start here
Route::group([],function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('product/product-details/{slug}', [IndexController::class, 'productDetails'])->name('product.product_details');
    // review route 
    Route::post('store/review', [ReviewController::class, 'storeReview'])->name('store.review');
    // wishlist route 
    Route::get('add/wishlist/{id}', [ReviewController::class, 'AddWishlist'])->name('add.wishlist');
});

