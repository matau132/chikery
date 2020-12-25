@extends('admin.master')
@section('title','Shipping Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($ship as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->price}}</td>
      <td><a href="{{route('admin.updateShipping',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteShipping',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$ship->appends(request()->input())->links()}}
<a href="{{route('admin.addShipping')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop