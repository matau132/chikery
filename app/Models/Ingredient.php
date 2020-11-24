<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','status'];
    public function product_detail(){
        return Ingredient::hasMany(Product_detail::class,'product_id','id');
    }
}
