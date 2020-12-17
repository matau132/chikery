@extends('admin.master')
@section('title','Payment Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($payment as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td><a href="{{route('admin.updatePayment',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deletePayment',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$payment->links()}}
<a href="{{route('admin.addPayment')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop