@extends('user.user_master')
@section('user')
<div>
    <p class="mb-5 text-right"><small>Order ID: <strong> {{$order->id}}</strong></small></p>
    <div class="row">
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
<div class="table-responsive user-order mt-5">
    <table class="table ps-table ps-table--shopping-cart table-hover">
      <thead>
        <tr>
            <th class="text-center">Product Id</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Size</th>
            <th class="text-center">Unit price</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php $price = 0; ?>
        @foreach($order_dt as $models)
        <?php $price += $models->price; ?>
        <tr>
            <td class="text-center">{{$models->product_id}}</td>
            <td class="text-center">{{$models->product->name}}</td>
            <td class="text-center"><img src="{{url('public/uploads/product')}}/{{$models->product->image}}" alt="" width="100px"></td>
            <td class="text-center">{{$models->size->name}}</td>
            <td class="text-center">${{number_format($models->price/$models->quantity,2)}}</td>
            <td class="text-center">{{$models->quantity}}</td>
            <td class="text-center">${{number_format($models->price,2)}}</td>
        </tr>
        @endforeach
        <tr>
          <td>Delivery Price: </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="text-center"><strong>${{number_format($order->shipping->price,2)}}</strong></td>
        </tr>
        <tr>
          <td>Total Price: </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="text-center"><strong>${{number_format($order->shipping->price + $price,2)}}</strong></td>
        </tr>
      </tbody>
    </table>
    @if($order->status==1)
    <div class="mt-5">
      <a href="{{route('user.order_cancel',$order->id)}}" class="btn btn-danger" style="font-size: 1.5rem">Cancel order</a>
    </div>
    @endif
</div>
@stop