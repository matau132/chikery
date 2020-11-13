@extends('admin.master')
@section('title','Product Managerment')
@section('admin-main')

<table class="table mb-2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Summary</th>
      <th scope="col">Content</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Image_list</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pros as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->sumary}}</td>
      <td>{{$models->content}}</td>
      <td>{{$models->price}}</td>
      <td>{{$models->image}}</td>
      <td>{{$models->image_list}}</td>
      <td><a href="" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{route('admin.addproduct')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop