@extends('admin.master')
@section('title','User Managerment')
@section('admin-main')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Email_verified_at</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($users as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->email}}</td>
      <td>{{$models->email_verified_at}}</td>
      <td>{{$models->password}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop