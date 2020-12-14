@extends('master')
@section('title','Cart')
@section('class','cart ps-page')
@section('main')
<div class="container">
  <div class="ps-shopping-cart">
    @if(empty($cart_items))
      <p class="text-center">There are no products in your cart.</p>
    @else
    <div class="table-responsive">
      <table class="table ps-table ps-table--shopping-cart">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart_items as $model)
            @foreach($model as $item)
            <tr>
              <td>
                <div class="ps-product--cart">
                  <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$item['image']}}" alt=""><a class="ps-product__overlay" href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}"></a></div>
                    <div class="ps-product__content"><a class="ps-product__title" href="{{route("shop.detail",[$item['id'],Str::slug($item['name'])])}}">{{$item['name']}}</a></div>
                </div>
              </td>
              <td>${{number_format($item['price'],2)}}</td>
              <td>
                <div class="form-group--number">
                  <button class="up"></button>
                  <button class="down"></button>
                  <input class="form-control" type="text" value="{{$item['quantity']}}">
                </div>
              </td>
              <td class="total">${{number_format($item['price']*$item['quantity'],2)}}</td>
              <td class="ps-table__actions"><a class="ps-btn--close" href="{{route('cart.remove',['id'=>$item['id'],'size_id'=>$item['size_id']])}}"></a></td>
            </tr>
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    <div class="ps-section__actions">
      @if(!empty($cart_items))
      <figure><a class="ps-btn ps-btn--outline" href="#">Clear Shopping Cart</a><a class="ps-btn ps-btn--outline" href="#">Update Shopping Cart</a></figure>
      @endif
      <figure><a class="ps-btn" href="{{route('shop')}}">Continue Shopping</a></figure>
    </div>
    <div class="ps-section__footer">
      <div class="ps-shopping-cart__coupon">
        <p>Enter your code if you have one. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Enter you code here">
          <button class="ps-btn">Apply Coupon</button>
        </div>
      </div>
      <figure class="ps-shopping-cart__total">
        <figcaption>Cart Total</figcaption>
        <table class="table">
          <tr>
            <td>SubTotal</td>
            <td><strong>$48.00</strong></td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>
              <div class="ps-radio">
                <input class="form-control" type="radio" id="shipping-1" name="shipping"/>
                <label for="shipping-1">Flat Rate: $50.00 </label>
              </div>
              <div class="ps-radio">
                <input class="form-control" type="radio" id="shipping-2" name="shipping"/>
                <label for="shipping-2">Free Shipping Estimate for Vietnam. </label>
              </div>
            </td>
          </tr>
          <tr class="total">
            <td>Total</td>
            <td>$48.00</td>
          </tr>
        </table><a class="ps-btn ps-btn--fullwidth" href="#">Proceed to checkout</a>
      </figure>
    </div>
  </div>
</div>
@stop