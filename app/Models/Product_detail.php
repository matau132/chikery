<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $fillable = ['product_id','ingredient_id'];
    public function product(){
        return Product_detail::belongsTo(Product::class,'id','product_id');
    }
    public function ingredient(){
        return Product_detail::belongsTo(Ingredient::class,'id','ingredient_id');
    }
}
