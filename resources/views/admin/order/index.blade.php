@extends('admin.master')
@section('title','Order Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Total price</th>
      <th scope="col">Status</th>
      <th scope="col">Ordered at</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $models)
    <?php $price = $order_dt->where('order_id',$models->id)->get()->sum('price');
          $shipping_price = $models->shipping->price;
          $total_price = $price + $shipping_price;
    ?>
    <tr style="cursor: pointer" class="this_order">
        <td>{{$models->id}}</td>
        <td>{{$models->customer_id}}</td>
        <td>{{$models->customer->email}}</td>
        <td>${{number_format($total_price,2)}}</td>
        @if($models->status==1)
        <td class="text-warning">Pending</td>
        @elseif($models->status==2)
        <td class="text-warning">Sending</td>
        @elseif($models->status==3)
        <td class="text-success">Received</td>
        @else
        <td class="text-danger">Canceled</td>
        @endif
        <td>{{$models->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$orders->links()}}
@stop

@section('js')
<script>
    $('.this_order').click(function(){
        var order_id = parseInt($(this).children(':first-child').html());
        window.location.assign('{{url("admin/order/detail")}}'+'/'+order_id);
    });
</script>
@stop