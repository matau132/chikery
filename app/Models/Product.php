<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','summary','content','price','weight','image','image_list','status','priority','category_id'];
    public function category(){
        return Product::hasOne(Category::class,'id','category_id');
    }
    public function product_detail(){
        return Product::hasMany(Product_detail::class,'product_id','id');
    }
}
