@extends('admin.master')
@section('title','Blog Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Summary</th>
      <th scope="col">Content</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($blogs as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->title}}</td>
      <td><img src="{{url('public/uploads/blog')}}/{{$models->image}}" alt="" width="100px"></td>
      <td>{{$models->summary}}</td>
      <td>{{$models->content}}</td>
      <td><a href="" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{route('admin.addblog')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
</div>
@stop