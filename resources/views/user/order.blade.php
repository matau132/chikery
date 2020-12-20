@extends('user.user_master')
@section('user')
<div class="table-responsive user-order">
    <table class="table ps-table ps-table--shopping-cart table-hover">
      <thead>
        <tr>
          <th class="text-center">Order ID</th>
          <th class="text-center">Status</th>
          <th class="text-center">Product quantity</th>
          <th class="text-center">Total price</th>
          <th class="text-center">Delivery</th>
          <th class="text-center">Payment</th>
          <th class="text-center">Ordered at</th>
        </tr>
      </thead>
      <tbody>
          @foreach($orders as $models)
          <?php $order_price = $order_dt->where('order_id',$models->id)->get()->sum('price');
                $shipping_price = $models->shipping->price;
                $total_order_price = $order_price + $shipping_price;
          ?>
          <tr class="this_order" style="cursor: pointer">
            <td class="text-center">{{$models->id}}</td>
            @if($models->status==1)
            <td class="text-center text-warning">Pending</td>
            @elseif($models->status==2)
            <td class="text-center text-primary">Sending</td>
            @elseif($models->status==3)
            <td class="text-center text-success">Received</td>
            @else
            <td class="text-center text-danger">Canceled</td>
            @endif
            <td class="text-center">{{$order_dt->where('order_id',$models->id)->get()->sum('quantity')}}</td>
            <td class="text-center">${{number_format($total_order_price,2)}}</td>
            <td class="text-center">{{$models->shipping->name}}</td>
            <td class="text-center">{{$models->payment->name}}</td>
            <td class="text-center">{{$models->created_at}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@stop

@section('js')
<script>
    $('.this_order').click(function(){
        var order_id = parseInt($(this).children(':first-child').html());
        window.location.assign('{{url("user/order-detail")}}'+'/'+order_id);
    });
</script>
@stop