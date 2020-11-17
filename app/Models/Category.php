<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','link','summary','image','status','priority'];
    public function product(){
        return Category::hasMany(Product::class,'category_id','id');
    }
}
