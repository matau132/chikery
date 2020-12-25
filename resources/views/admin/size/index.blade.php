@extends('admin.master')
@section('title','Size Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Summary</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($sizes as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td>{{$models->summary}}</td>
      <td><a href="{{route('admin.updateSize',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteSize',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$sizes->appends(request()->input())->links()}}
<a href="{{route('admin.addSize')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop