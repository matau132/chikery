<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['name','summary','status'];
    public function products(){
        return $this->belongsToMany(Product::class,'size_details','size_id','product_id');
    }

    public function add($request)
    {
        Size::create($request->only('name','summary'));
    }

    public function edit($id,$request)
    {
        Size::where('id',$id)->update($request->only('name','summary','status'));
    }

    public function remove($id)
    {
        $count_whishlist = Whishlist::where('size_id',$id)->get()->count();
        if($count_whishlist>0){
            $flag = false;
        }
        else{
            Size_detail::where('size_id',$id)->delete();
            Size::where('id',$id)->delete();
            $flag = true;
        }
        return $flag;
    }
}
