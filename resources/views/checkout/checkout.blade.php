@extends('master')
@section('title','Checkout')
@section('class','checkout ps-page')
@section('main')
<div class="container">
  <form class="ps-form--checkout" action="" method="post">
  @csrf
  <input type="hidden" name="shipping_id" value="{{$shipping->id}}">
    <div class="ps-checkout">
      <div class="ps-checkout__left">
        <div class="ps-checkout__header">
          <p>Have a Coupon ?<a href="{{route('cart')}}"> Click here to enter your code</a></p>
        </div>
          <h4>Billing Detail</h4>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" placeholder="" name="name">
            @error('name')
              <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
            @enderror
          </div>
          <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" placeholder="" name="address">
            @error('address')
              <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
            @enderror
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" placeholder="" name="email">
                @error('email')
                  <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
                @enderror
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
              <div class="form-group">
                <label>Phone</label>
                <input class="form-control" type="text" placeholder="" name="phone">
                @error('phone')
                  <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
                @enderror
              </div>
            </div>
          </div>
          <div class="ps-checkbox ps-checkbox--circle different-address">
            <input class="form-control" type="checkbox" id="shipping" name="other_person" checked="checked"/>
            <label for="shipping">Ship to other person?</label>
          </div>
          <div class="form-group">
            <label>Order Note</label>
            <textarea class="form-control" rows="4" placeholder="" name="note"></textarea>
          </div>
      </div>
      <div class="ps-checkout__right">
        <div class="ps-block--your-order">
          <div class="ps-block__header">
            <h3>Your order</h3>
          </div>
          <div class="ps-block__divider"></div>
          <div class="ps-block__detail">
            <h5>Products</h5>
            <?php $product_price = 0; ?>
            @foreach($cart_items as $pro_id => $model)
              @foreach($model as $size_id => $item)
                <?php $product_price += $item['quantity'] * $item['price']; ?>
                <p>{{$item['name']}} - {{$size->find($size_id)->name}} x{{$item['quantity']}}<span>${{number_format($item['quantity']*$item['price'],2)}}</span></p>
              @endforeach
            @endforeach
            <div class="ps-block__divider"></div>
            <p>Subtotal<strong>${{number_format($product_price,2)}}</strong></p>
            <div class="ps-block__divider"></div>
            <p>Shipping<span>${{number_format($shipping->price,2)}}</span></p>
            <div class="ps-block__divider"></div>
            <p class="total">Total<strong>${{number_format($product_price + $shipping->price,2)}}</strong></p>
          </div>
          <div class="ps-block__payment-methond">
            @foreach($payment as $model)
            <div class="ps-radio">
              <input class="form-control" type="radio" id="order-{{$model->id}}" name="payment" value="{{$model->id}}"/>
              <label for="order-{{$model->id}}">{{$model->name}}</label>
            </div>
            @endforeach
            @error('payment')
              <small id="emailHelp" class="form-text text-danger mb-5">{{$message}}.</small>
            @enderror
          </div>
          <div class="ps-block__footer">
            <button class="ps-btn ps-btn--fullwidth">Place Order</button>
          </div>
        </div>
      </div>
    </div>
  <form/>
</div>
@stop