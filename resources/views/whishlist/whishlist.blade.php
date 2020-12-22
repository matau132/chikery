@extends('master')
@section('title','Whishlist')
@section('class','whishlist ps-page')
@section('main')
<div class="container">
  <div class="ps-whishlist">
    <div class="table-responsive">
      <table class="table ps-table ps-table--whishlist">
        <thead>
          <tr>
            <th>Product Name</th>
            <th class="text-center">Size</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Stock Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($whishlists as $model)
          <tr>
            <td>
              <div class="ps-product--cart">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$model->product->image}}" alt=""><a class="ps-product__overlay" href="{{route("shop.detail",[$model->product_id,Str::slug($model->product->name)])}}"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="{{route("shop.detail",[$model->product_id,Str::slug($model->product->name)])}}">{{$model->product->name}}</a></div>
              </div>
            </td>
            <td class="text-center">{{$model->size->name}}</td>
            <?php 
              $item = $size_dt->where('product_id',$model->product_id)->where('size_id',$model->size_id)->first();
              $price = $item->sale_price? $item->sale_price: $item->price;
            ?>
            <td class="text-center">${{number_format($price,2)}}</td>
            <td class="text-center"><span class="ps-instock {{$item->status==1?'text-success':'text-danger'}}">{{$item->status==1?'Instock':'Out of stock'}}</span></td>
            <td class="ps-table__actions"><a class="ps-btn" href="{{route('cart.add',['id'=>$model->product_id,'size_id'=>$model->size_id])}}"> Add to cart</a><a class="ps-btn--close" href="{{route('whishlist.remove',['id'=>$model->product_id,'size_id'=>$model->size_id])}}"></a></td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop