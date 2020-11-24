@extends('admin.master')
@section('title','Product detail Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Ingredient ID</th>
      <th scope="col">Ingredient quantity</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pro_d as $models)
      <td>{{$models->product_id}}</td>
      <td>{{$models->ingredient_id}}</td>
      <td>{{$models->ingredient_quantity}}</td>
      <td><a href="{{route('admin.updateProduct_detail',[$models->product_id,$models->ingredient_id])}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteProduct_detail',[$models->product_id,$models->ingredient_id])}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pro_d->links()}}
@stop