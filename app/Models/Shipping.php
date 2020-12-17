<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','status'];
    public function order(){
        return Shipping::hasMany(Order::class,'shipping_id','id');
    }
    
    public function add($request)
    {
        Shipping::create($request->only('name','price'));
    }

    public function edit($id,$request)
    {
        Shipping::where('id',$id)->update($request->only('name','price','status'));
    }

    public function remove($id)
    {
        if($this->order->count()>0){
            $check = false;
        }
        else{
            $check = Shipping::where('id',$id)->delete();
        }
        return $check;
    }
}
