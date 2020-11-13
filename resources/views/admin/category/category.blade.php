@extends('admin.master')
@section('title','Category Managerment')
@section('admin-main')

<table class="table mb-2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Link</th>
      <th scope="col">Summary</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      @foreach($cats as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->image}}</td>
      <td>{{$models->link}}</td>
      <td>{{$models->sumary}}</td>
      <td><a href="" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{route('admin.addcategory')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop