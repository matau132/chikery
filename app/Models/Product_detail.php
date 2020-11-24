<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $fillable = ['product_id','ingredient_id','quantity'];
    public function product(){
        Product_detail::hasOne(Product::class,'id','product_id');
    }
    public function ingredient(){
        Product_detail::hasOne(Ingredient::class,'id','ingredient_id');
    }
}
