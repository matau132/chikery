@extends('admin.master')
@section('title','Product detail Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Ingredient</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pro_d as $models)
      <td>{{$models->product->name}}</td>
      <td>{{$models->ingredient->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pro_d->appends(request()->input())->links()}}
@stop