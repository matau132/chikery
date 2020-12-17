@extends('master')
@section('title','Cart')
@section('class','cart ps-page')
@section('main')
<?php $sub_price = 0; ?>
<div class="container">
  <div class="ps-shopping-cart">
    @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close" style="bottom: 0">
          <span aria-hidden="true" style="font-family: inherit;font-size: 2.5rem;padding: 7px 12.5px">&times;</span>
        </button>
        <strong>{{session()->get('error')}}</strong> 
      </div>
    @endif
    @if(empty($cart_items))
      <p class="text-center">There are no products in your cart.</p>
    @else
    <form action="{{route('cart.update')}}" method="post">
      @csrf
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close" style="bottom: 0">
          <span aria-hidden="true" style="font-family: inherit;font-size: 2.5rem;padding: 7px 12.5px">&times;</span>
        </button>
        <strong>{{session()->get('success')}}</strong> 
      </div>
      @endif
      <div class="table-responsive">
        <table class="table ps-table ps-table--shopping-cart">
          <thead>
            <tr>
              <th>Product Name</th>
              <th class="text-center">Size</th>
              <th class="text-center">Unit Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total</th>
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
                <style>.select2{margin-right: 0 !important;}</style>
                <td class="ps-product--detail">
                  <div class="ps-product__shopping pb-0">
                    <select class="ps-select size_box" title="Choose Size" name="cart[{{$item['id']}}][{{$item['size_id']}}][size_id]">
                      @foreach($product->find($item['id'])->sizes as $size)
                        <option value="{{$size->id}}" {{$size->id==$item['size_id']?'selected':''}}>{{$size->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </td>
                <td class="text-center">${{number_format($item['price'],2)}}</td>
                <td class="text-center">
                  <div class="form-group--number" style="width: 150px">
                    <button class="up" type="button"></button>
                    <button class="down" type="button"></button>
                    <input class="form-control" type="text" value="{{$item['quantity']}}" name="cart[{{$item['id']}}][{{$item['size_id']}}][quantity]">
                  </div>
                </td>
                <td class="total text-center">${{number_format($item['price']*$item['quantity'],2)}}</td>
                <td class="ps-table__actions text-center"><a class="ps-btn--close" href="{{route('cart.remove',['id'=>$item['id'],'size_id'=>$item['size_id']])}}"></a></td>
              </tr>
              <?php $sub_price += $item['quantity']*$item['price']; ?>
              @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
      <div class="ps-section__actions">
        @if(!empty($cart_items))
        <figure><a class="ps-btn ps-btn--outline" href="{{route('cart.clear')}}">Clear Shopping Cart</a><button class="ps-btn ps-btn--outline">Update Shopping Cart</button></figure>
        @endif
        <figure class="{{empty($cart_items)?'text-center':''}}"><a class="ps-btn" href="{{route('shop')}}">Continue Shopping</a></figure>
      </div>
    </form>
    @if(!empty($cart_items))
    <div class="ps-section__footer">
      <div class="ps-shopping-cart__coupon">
        <p>Enter your code if you have one. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Enter you code here">
          <button class="ps-btn">Apply Coupon</button>
        </div>
      </div>
      <figure class="ps-shopping-cart__total">
        <form action="{{route('checkout')}}">
        <figcaption>Cart Total</figcaption>
        <table class="table">
          <tr>
            <td>SubTotal</td>
            <td><strong>${{number_format($sub_price,2)}}</strong></td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>
              @foreach($ship as $model)
              <div class="ps-radio">
                <input class="form-control" type="radio" id="shipping-{{$model->id}}" name="shipping" value="{{$model->id}}"/>
                <label for="shipping-{{$model->id}}" class="shipping_label">{{$model->name}}: ${{number_format($model->price,2)}} </label>
              </div>
              @endforeach
            </td>
          </tr>
          <tr class="total">
            <td>Total</td>
            <td class="total_price">${{number_format($sub_price,2)}}</td>
          </tr>
        </table><button class="ps-btn ps-btn--fullwidth">Proceed to checkout</button>
      </form>
      </figure>
    </div>
    @endif
  </div>
</div>
@stop
@section('js')
<script>
  $(document).ready(function () {
    var total_price = {{$sub_price}};
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD'
    });

    $('.form-group--number button').click(function () { 
      var quantity = parseInt($(this).siblings('input').val());
      if($(this).hasClass('up')){
        quantity += 1;
      }
      else{
        if(quantity>0){
          quantity -= 1;
        }
      }
      $(this).siblings('input').attr('value',quantity);
    });
   
    $('.shipping_label').click(function () { 
      $.ajax(
        {
          type: 'GET',
          url: '{{url("api/cart/change-shipping")}}',
          data: {shipping_id: $(this).prev().val()},
          success: function(res){
            var total_shipping_price = total_price + parseInt(res);
            $('.total_price').html(formatter.format(total_shipping_price));
          }
        }
      );
      // console.log(total_price);
    });
  });
</script>
@stop