<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['name','status'];
    public function order(){
        return Payment::hasMany(Order::class,'payment_id','id');
    }

    public function add($request)
    {
        Payment::create($request->only('name'));
    }

    public function edit($id,$request)
    {
        Payment::where('id',$id)->update($request->only('name','status'));
    }

    public function remove($id)
    {
        if($this->order->count()>0){
            $check = false;
        }
        else{
            $check = Payment::where('id',$id)->delete();
        }
        return $check;
    }
}
