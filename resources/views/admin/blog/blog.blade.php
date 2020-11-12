@extends('admin.master')
@section('title','Blog Managerment')
@section('admin-main')

<table class="table mb-2">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">sumary</th>
      <th scope="col">content</th>
      <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($blogs as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->title}}</td>
      <td>{{$models->sumary}}</td>
      <td>{{$models->content}}</td>
      <td>{{$models->image}}</td>
      <td><a href="" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{route('admin.addblog')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop