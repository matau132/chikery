<?php
    use App\Models\Size;
    $cart = session('cart') ? session('cart') : []; 
    $total_price = 0;
    $total_quantity = 0;
    foreach ($cart as $model) {
      foreach ($model as $item) {
        $total_quantity += $item['quantity'];
      }
    }
?>
<div class="ps-cart--mini"><a class="ps-cart__toggle" href="{{route('cart')}}"><i class="fa fa-shopping-basket"></i>
  @if($total_quantity>0)
  <span><i>{{$total_quantity}}</i></span>
  @endif
</a>
    <div class="ps-cart__content">
      <div class="ps-cart__items" style="overflow: auto; max-height: 280px">
        @if(empty($cart))
          <p class="text-center mt-3">There are no products in your cart.</p>
        @else
          @foreach($cart as $model)
              @foreach($model as $item)
              <div class="ps-product--mini-cart">
                  <div class="ps-product__thumbnail"><a href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}"><img src="{{url('public/uploads/product')}}/{{$item['image']}}" alt=""></a></div>
                  <div class="ps-product__content"><a class="ps-btn--close" href="{{route('cart.remove',['id'=>$item['id'],'size_id'=>$item['size_id']])}}"><span></span></a><a class="ps-product__title" href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}">{{$item['name']}}</a>
                      <p><strong class="mr-4">Size: {{Size::find($item['size_id'])->name}}</strong><strong>Quantity: {{$item['quantity']}}</strong></p><small>${{number_format($item['price'],2)}}</small>
                  </div>
              </div>
              <?php $total_price += $item['quantity'] * $item['price']; ?>
              @endforeach
          @endforeach
        @endif
      </div>
      <div class="ps-cart__footer">
        @if(!empty($cart))
          <h3>Sub Total:<strong>${{number_format($total_price,2)}}</strong></h3>
        @endif
        <figure><a class="ps-btn" href="{{route('cart')}}">View Cart</a><a class="ps-btn ps-btn--dark" href="{{route('checkout')}}">Checkout</a></figure>
      </div>
    </div>
</div>