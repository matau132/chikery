@extends('admin.master')
@section('title','Size detail Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Size</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($size_d as $models)
      <td>{{$models->product->name}}</td>
      <td>{{$models->size->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$size_d->links()}}
@stop