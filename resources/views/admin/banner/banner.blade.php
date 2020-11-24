@extends('admin.master')
@section('title','Banner Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Summary</th>
      <th scope="col">Link</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($bns as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->title}}</td>
      <td><img src="{{url('public/uploads/banner')}}/{{$models->image}}" alt="" width="100px"></td>
      <td>{{$models->summary}}</td>
      <td>{{$models->link}}</td>
      <td><a href="{{route('admin.updateBanner',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteBanner',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$bns->links()}}
<a href="{{route('admin.addBanner')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop