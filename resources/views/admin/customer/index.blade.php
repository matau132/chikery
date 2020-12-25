@extends('admin.master')
@section('title','Customer Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($customers as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->email}}</td>
      <td>{{$models->phone}}</td>
      <td>{{$models->address}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$customers->appends(request()->input())->links()}}
@stop