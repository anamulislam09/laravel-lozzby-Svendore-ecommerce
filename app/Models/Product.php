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
        'product_video',
        'purchase_price',
        'selling_price',
        'descount_price',
        'stock_quantity',
        'warehouse',
        'product_description',
        'product_thumbnail',
        'product_images',
        'featured',
        'today_deal',
        'status',
        'flash_deal_id',
        'cash_on_delivery',
        'admin_id',
    ];
}
