<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/admin-login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'adminLogin'])->name('admin.login');


// admin group route
Route::middleware('is_admin')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Category route
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store.category');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit']);
        Route::post('/update', [CategoryController::class, 'update'])->name('update.category');
    });

    // subcategory route
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('store.subcategory');
        Route::get('/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
        Route::get('/edit/{id}', [SubcategoryController::class, 'edit']);
        Route::post('/update', [SubcategoryController::class, 'update'])->name('update.subcategory');
    });

    // childcategory route
    Route::group(['prefix' => 'childcategory'], function () {
        Route::get('/', [ChildcategoryController::class, 'index'])->name('childcategory.index');
        Route::get('/create', [ChildcategoryController::class, 'create'])->name('childcategory.create');
        Route::post('/subcategory', [ChildcategoryController::class, 'subcategory']); // get subcategory using ajex 

        Route::post('/store', [ChildcategoryController::class, 'store'])->name('store.childcategory');
        Route::get('/delete/{id}', [ChildcategoryController::class, 'destroy'])->name('childcategory.delete');
        Route::get('/edit/{id}', [ChildcategoryController::class, 'edit']);
        Route::post('/update', [ChildcategoryController::class, 'update'])->name('update.childcategory');
    });

    // childcategory route
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('store.brand');
        Route::get('/edit/{id}', [BrandController::class, 'edit']);
        Route::post('/update', [BrandController::class, 'update'])->name('update.brand');
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
    });

    // Settings route
    Route::group(['prefix' => 'setting'], function () {
        // Seo setting
        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', [SettingController::class, 'seo'])->name('seo.setting');
            Route::post('/update/{id}', [SettingController::class, 'seoUpdate'])->name('seo.update');
        });

        // Seo setting
        Route::group(['prefix' => 'smtp'], function () {
            Route::get('/', [SettingController::class, 'smtp'])->name('smtp.setting');
            Route::post('/update/{id}', [SettingController::class, 'smtpUpdate'])->name('smtp.update');
        });

        // page creation setting
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', [PageController::class, 'index'])->name('page.index');
            Route::get('/create', [PageController::class, 'create'])->name('page.create');
            Route::post('/store', [PageController::class, 'store'])->name('store.page');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
            Route::post('/update/{id}', [PageController::class, 'update'])->name('update.page');
            Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('page.delete');
        });
    });
});
