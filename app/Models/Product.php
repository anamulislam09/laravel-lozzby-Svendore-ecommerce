<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'product_name',
        'product_slug',
        'product_code',
        'product_unit',
        'product_tags',
        'product_color',
        'product_size',
        'product_video',
        'purchase_price',
        'selling_price',
        'descount_price',
        'stock_quantity',
        'warehouse',
        'product_description',
        'product_thumbnail',
        'images',
        'featured',
        'today_deal',
        'status',
        'product_slider',
        'cash_on_delivery',
        'admin_id',
        'pickup_point_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function childcategory(){
        return $this->belongsTo(Childcategory::class, 'childcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function pickuppoint(){
        return $this->belongsTo(pickup_point::class, 'pickup_point_id');
    }
}
