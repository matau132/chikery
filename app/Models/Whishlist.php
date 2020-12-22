<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','product_id','size_id'];
    
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function size()
    {
        return $this->hasOne(Size::class,'id','size_id');
    }
}
