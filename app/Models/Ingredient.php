<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','status'];
    public function products(){
        return $this->belongsToMany(Product::class,'product_details','ingredient_id','product_id');
    }

    public function add($request)
    {
        Ingredient::create($request->only('name','price'));
    }

    public function edit($id,$request)
    {
        Ingredient::where('id',$id)->update($request->only('name','price','status'));
    }

    public function remove($id)
    {
        Product_detail::where('ingredient_id',$id)->delete();
        Ingredient::where('id',$id)->delete();
    }
}
