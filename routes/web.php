<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\frontend\IndexController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::get('/login', function(){
    return redirect()->to('/');
})->name('login');

Route::get('/register', function(){
    return redirect()->to('/');
})->name('register');

Route::get('/logout', [IndexController::class, 'logout'])->name('customer.logout');

// frontend route start here
Route::group([],function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('product/product-details/{slug}', [IndexController::class, 'productDetails'])->name('product.product_details');
});

