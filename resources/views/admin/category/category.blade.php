@extends('admin.master')
@section('title','Category Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Link</th>
      <th scope="col">Summary</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    <tr>
      @foreach($cats as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td><img src="{{url('public/uploads/category')}}/{{$models->image}}" alt="" width="100px"></td>
      <td>{{$models->link}}</td>
      <td>{{$models->summary}}</td>
      <td><a href="{{route('admin.updateCategory',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteCategory',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{-- {{$cats->link()}} --}}
<a href="{{route('admin.addcategory')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
</div>
@stop