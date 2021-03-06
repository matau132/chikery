<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Helpers\Cart;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','name','email','phone','address','note','status','payment_id','shipping_id'];

    public function shipping()
    {
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class,'id','payment_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function add($request)
    {
        $cart = new Cart();
        $order = Order::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'note' => $request->note,
            'payment_id' => $request->payment,
            'shipping_id' => $request->shipping_id
        ]);

        foreach($cart->items as $pro_id => $model){     //order detail
            foreach($model as $size_id => $item){
                Order_detail::create([
                    'order_id' => $order->id,
                    'product_id' => $pro_id,
                    'size_id' => $size_id,
                    'quantity' => $item['quantity'],
                    'price' => $item['quantity'] * $item['price']
                ]);
            }
        }
    }
}
