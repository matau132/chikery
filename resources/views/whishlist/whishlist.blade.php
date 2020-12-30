@extends('master')
@section('title','Wishlist')
@section('class','whishlist ps-page')
@section('main')
<div class="container">
  <div class="ps-whishlist">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close" style="bottom: 0">
            <span aria-hidden="true" style="font-family: inherit;font-size: 2.5rem;padding: 7px 12.5px">&times;</span>
        </button>
        <strong>{{session()->get('success')}}</strong> 
    </div>
    @endif
    <div class="table-responsive">
      <table class="table ps-table ps-table--whishlist">
        <style>.select2{margin-right: 0 !important;}</style>
        <thead>
          <tr>
            <th>Product Name</th>
            <th class="text-center">Size</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($whishlists as $model)
          <form action="{{route('whishlist.order')}}" method='post'>
            @csrf
          <tr>
            <td>
              <div class="ps-product--cart">
                <div class="ps-product__thumbnail"><img src="{{url('public/uploads/product')}}/{{$model->product->image}}" alt=""><a class="ps-product__overlay" href="{{route("shop.detail",[$model->product_id,Str::slug($model->product->name)])}}"></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="{{route("shop.detail",[$model->product_id,Str::slug($model->product->name)])}}">{{$model->product->name}}</a></div>
              </div>
            </td>
            <td class="ps-product--detail">
              <div class="ps-product__shopping pb-0">
                <select class="ps-select size_box" title="Choose Size" name="size_id">
                    @foreach($model->product->sizes as $size)
                    <option value="{{$size->id}}" {{$model->size_id==$size->id?'selected':''}}>{{$size->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" value="{{$model->product_id}}" name="product_id">
              </div>
            </td>
            <?php 
              $item = $size_dt->where('product_id',$model->product_id)->where('size_id',$model->size_id)->first();
              $price = $item->sale_price? $item->sale_price: $item->price;
            ?>
            <td class="text-center">${{number_format($price,2)}}</td>
            <td class="text-center"><span class="ps-instock {{$model->product->status==1?'text-success':'text-danger'}}">{{$item->status==1?'Instock':'Out of stock'}}</span></td>
            <td class="ps-table__actions"><button class="ps-btn" href=""> Add to cart</button><a class="ps-btn--close" href="{{route('whishlist.remove',['id'=>$model->product_id,'size_id'=>$model->size_id])}}"></a></td>
          </tr>
        </form>
         @endforeach
        </tbody>
      </table>
      @if($whishlists->count()==0)
      <p class="text-center mt-5">There are no products in your whishlist.</p>
      @endif
    </div>
  </div>
</div>
@stop

@section('js')
<script>
  $(document).ready(function () {
    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD'
    });

    $('.size_box').change(function(){     //change size
      var customer_id = {{Auth::guard('customer')->check()?Auth::guard('customer')->user()->id:'null'}}
      $('.load-animation').css('display','flex');
      var box = $(this);
      $.ajax({
        type: 'GET',
        url: '{{url("api/product-detail/change-size")}}',
        data: {pro_id: $(this).parent().find('input[type=hidden]').val(),size_id: $(this).val(),customer_id: customer_id},
        dataType: 'json',
        success: function (res) {
          if(res.pro_dt.sale_price){
            box.parents('td').next().html(formatter.format(res.pro_dt.sale_price));
          }
          else{
            box.parents('td').next().html(formatter.format(res.pro_dt.price));
          }
          $('.load-animation').css('display','none');
        }
      });
    });
  });
</script>
@stop