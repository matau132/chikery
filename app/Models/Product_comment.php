<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_comment extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','product_id','content','rating'];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
