@extends('admin.master')
@section('title','Order Managerment')
@section('admin-main')
<div>
  <div class="overflow-hidden">
    <div class="form-group float-left">
      <select name="status" class="form-control status-box">
          <option value="1" class="text-warning" {{$order->status==1?'selected':''}}>Pending</option>
          <option value="2" class="text-primary" {{$order->status==2?'selected':''}}>Sending</option>
          <option value="3" class="text-success" {{$order->status==3?'selected':''}}>Received</option>
          <option value="4" class="text-danger" {{$order->status==4?'selected':''}}>Canceled</option>
      </select>
    </div>
    <p class="mb-0 float-right"><small>Order ID: <strong> {{$order->id}}</strong></small></p>
  </div>
  <div class="d-flex flex-wrap">
    <p class="mr-5">Dilivery Service: <strong>{{$order->shipping->name}}</strong></p>
    <p>Payment method: <strong>{{$order->payment->name}}</strong></p>
  </div>
  <div class="row mt-4">
    <div class="col-lg-6 col-md-6 mb-5 mb-md-0">
      <h4 class="mb-4">Orderer</h4>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Ordered By: </p>
        <p style="width: 70%">{{$order->customer->name}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Email: </p>
        <p style="width: 70%">{{$order->customer->email}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Phone number: </p>
        <p style="width: 70%">{{$order->customer->phone}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Address: </p>
        <p style="width: 70%">{{$order->customer->address}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Note: </p>
        <p style="width: 70%">{{$order->note}}</p>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <h4 class="mb-4">Receiver</h4>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Name: </p>
        <p style="width: 70%">{{$order->name}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Email: </p>
        <p style="width: 70%">{{$order->email}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Phone number: </p>
        <p style="width: 70%">{{$order->phone}}</p>
      </div>
      <div class="d-flex flex-wrap">
        <p style="width: 30%">Address: </p>
        <p style="width: 70%">{{$order->address}}</p>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive mt-5">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Size</th>
      <th scope="col">Unit price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $price = 0; ?>
    @foreach($order_dt as $models)
    <?php $price += $models->price; ?>
    <tr>
        <td>{{$models->product_id}}</td>
        <td>{{$models->product->name}}</td>
        <td><img src="{{url('public/uploads/product')}}/{{$models->product->image}}" alt="" width="100px"></td>
        <td>{{$models->size->name}}</td>
        <td>${{number_format($models->price/$models->quantity,2)}}</td>
        <td>{{$models->quantity}}</td>
        <td>${{number_format($models->price,2)}}</td>
    </tr>
    @endforeach
    <tr>
      <td>Delivery Price: </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>${{number_format($order->shipping->price,2)}}</strong></td>
    </tr>
    <tr>
      <td>Total Price: </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>${{number_format($order->shipping->price + $price,2)}}</strong></td>
    </tr>
  </tbody>
</table>
</div>
@stop

@section('js')
<script>
    $(document).ready(function () {
      $('.status-box').change(function(){
        $('.load-animation').css('display','flex');
        $.ajax({
          url: '{{url("/api/order-status")}}',
          type: 'POST',
          data: {order_id: {{$order->id}},status: $(this).val()},
          success: function(res){
            $('.load-animation').css('display','none');
          }
        });
      });
    });
</script>
@stop