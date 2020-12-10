@extends('admin.master')
@section('title','Admin Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($admins as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->email}}</td>
      <td>{{$models->password}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$admins->links()}}
<a href="{{route('admin.addAdmin')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@if(Auth::guard('admin')->check())
<a href="{{route('admin.updateAdmin',Auth::guard('admin')->user()->id)}}" class="btn btn-primary" title="Update"><i class="fas fa-pen pr-2"></i>Update</a>
@endif
@stop