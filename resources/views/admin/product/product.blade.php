@extends('admin.master')
@section('title','Product Managerment')
@section('admin-main')

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">sumary</th>
      <th scope="col">content</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">image_list</th>
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