@extends('admin.master')
@section('title','Product detail Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Ingredient ID</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pro_d as $models)
      <td>{{$models->product_id}}</td>
      <td>{{$models->ingredient_id}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pro_d->links()}}
@stop