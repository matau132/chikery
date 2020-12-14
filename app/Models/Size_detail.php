<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size_detail extends Model
{
    use HasFactory;
    protected $table = 'size_details';
    protected $fillable = ['product_id','size_id','price','sale_price','quantity'];
    public function product()
    {
        return Size_detail::hasOne(Product::class,'id','product_id');
    }
    public function size()
    {
        return Size_detail::hasOne(Size::class,'id','size_id');
    }
}
