<?php
namespace App\Helpers;
use App\Models\Size_detail;

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
        foreach($this->items as $cart_item){
            foreach($cart_item as $item){
                if($request->cart[$item['id']][$item['size_id']]['quantity']==0){
                    unset($this->items[$item['id']][$item['size_id']]);
                }
                else{
                    $this->items[$item['id']][$item['size_id']]['quantity'] = $request->cart[$item['id']][$item['size_id']]['quantity'];
                }
                if(empty($this->items[$item['id']])){
                    unset($this->items[$item['id']]);
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
}

?>