<?php 
    use App\Models\Size;
    $cart_mobile = session('cart') ? session('cart') : [];
    $mobile_total_price = 0; 
?>
<div class="ps-panel--sidebar" id="cart-mobile" style="height: 92vh">
    <div class="ps-panel__header">
      <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
      <div class="ps-cart--mobile">
        <div class="ps-cart__content">
          <div class="ps-cart__items">
            @if(empty($cart_mobile))
              <p class="text-center mt-3">There are no products in your cart.</p>
            @else
              @foreach($cart_mobile as $model)
                  @foreach($model as $item)
                  <div class="ps-product--mini-cart">
                      <div class="ps-product__thumbnail"><a href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}"><img src="{{url('public/uploads/product')}}/{{$item['image']}}" alt=""></a></div>
                      <div class="ps-product__content"><a class="ps-btn--close" href="{{route('cart.remove',['id'=>$item['id'],'size_id'=>$item['size_id']])}}"><span></span></a><a class="ps-product__title" href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}">{{$item['name']}}</a>
                          <p><strong class="mr-4">Size: {{Size::find($item['size_id'])->name}}</strong><strong>Quantity: {{$item['quantity']}}</strong></p><small>${{number_format($item['price'],2)}}</small>
                      </div>
                  </div>
                  <?php $mobile_total_price += $item['quantity'] * $item['price']; ?>
                  @endforeach
              @endforeach
            @endif
          </div>
          <div class="ps-cart__footer" style="margin-left: -10px;margin-right: -10px">
            @if(!empty($cart_mobile))
              <h3>Sub Total:<strong>${{number_format($mobile_total_price,2)}}</strong></h3>
            @endif
            <figure><a class="ps-btn mb-0" href="{{route('cart')}}">View Cart</a><a class="ps-btn ps-btn--dark mb-0" href="{{route('checkout')}}">Checkout</a></figure>
          </div>
        </div>
      </div>
    </div>
</div>