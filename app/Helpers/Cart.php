<?php
namespace App\Helpers;
use App\Models\Size_detail;
use App\Models\Product;

class Cart{
    public $items = [];

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function add($pro,$size_id, $quantity = 1)
    {
        $product_detail = Size_detail::where('product_id',$pro->id)->where('size_id',$size_id)->first();
        if(isset($this->items[$pro->id][$size_id])){
            $this->items[$pro->id][$size_id]['quantity'] += 1;
        }
        else{
            $item = [
                'id' => $pro->id,
                'size_id' => $size_id,
                'name' => $pro->name,
                'image' => $pro->image,
                'price' => $product_detail->sale_price ? $product_detail->sale_price : $product_detail->price,
                'quantity' => $quantity,
            ];
            $this->items[$pro->id][$size_id] = $item;
        }
        session(['cart'=>$this->items]);
    }

    public function update($request)
    {
        // dd($request->all());
        foreach($this->items as $pro_id => $cart_item){
            foreach($cart_item as $cart_size_id => $item){
                $quantity = $request->cart[$pro_id][$cart_size_id]['quantity'];
                $size_id = $request->cart[$pro_id][$cart_size_id]['size_id'];
                if($quantity==0||is_null($quantity)){
                    unset($this->items[$pro_id][$cart_size_id]);
                }
                else{
                    $this->items[$pro_id][$cart_size_id]['quantity'] = $quantity;
                }
                if($size_id != $cart_size_id){
                    if(isset($this->items[$pro_id][$size_id])){
                        $this->items[$pro_id][$size_id]['quantity'] += $quantity;
                    }
                    else{
                        $size_dt = Size_detail::where('product_id',$pro_id)->where('size_id',$size_id)->first();
                        $this->items[$pro_id][$size_id] = $item;
                        $this->items[$pro_id][$size_id]['quantity'] = $quantity;
                        $this->items[$pro_id][$size_id]['size_id'] = $size_id;
                        $this->items[$pro_id][$size_id]['price'] = $size_dt->sale_price ? $size_dt->sale_price : $size_dt->price;
                    }
                    unset($this->items[$pro_id][$cart_size_id]);
                }
                if(empty($this->items[$pro_id])){
                    unset($this->items[$pro_id]);
                }
            }
        }
        session(['cart' => $this->items]);
    }

    public function remove($id,$size_id)
    {
        unset($this->items[$id][$size_id]);
        if(empty($this->items[$id])){
            unset($this->items[$id]);
        };
        session(['cart'=>$this->items]);
    }

    public function order($pro_id,$size_id,$quantity)
    {
        $pro = Product::find($pro_id);
        $product_detail = Size_detail::where('product_id',$pro->id)->where('size_id',$size_id)->first();
        if(isset($this->items[$pro->id][$size_id])){
            $this->items[$pro->id][$size_id]['quantity'] += $quantity;
        }
        else{
            $item = [
                'id' => $pro->id,
                'size_id' => $size_id,
                'name' => $pro->name,
                'image' => $pro->image,
                'price' => $product_detail->sale_price ? $product_detail->sale_price : $product_detail->price,
                'quantity' => $quantity,
            ];
            $this->items[$pro->id][$size_id] = $item;
        }
        session(['cart'=>$this->items]);
    }
}

?>