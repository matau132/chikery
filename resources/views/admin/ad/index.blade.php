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
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($admins as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->email}}</td>
      <td>{{$models->password}}</td>
      <td><a href="{{route('admin.updateAdmin',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteAdmin',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$admins->links()}}
<a href="{{route('admin.addAdmin')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop