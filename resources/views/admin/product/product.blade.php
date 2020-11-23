@extends('admin.master')
@section('title','Product Managerment')
@section('admin-main')
<div class="table-responsive">
<table class="table table-hover mb-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Image_list</th>
      <th scope="col">Weight</th>
      <th scope="col">Summary</th>
      <th scope="col">Content</th>
      <th scope="col">Price</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pros as $models)
      <td>{{$models->id}}</td>
      <td>{{$models->name}}</td>
      <td><img src="{{url('public/uploads/product')}}/{{$models->image}}" alt="" width="100px"></td>
      <td>
        @foreach(json_decode($models->image_list) as $img_list_name)
        <img src="{{url('public/uploads/product')}}/{{$img_list_name}}" alt="" width="100px" height="80px">
        @endforeach
      </td>
      <td>{{$models->weight}}g</td>
      <td>{{$models->summary}}</td>
      <td>{{$models->content}}</td>
      <td>{{$models->price}}</td>
      <td><a href="{{route('admin.updateProduct',$models->id)}}" class="btn text-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="{{route('admin.deleteProduct',$models->id)}}" title="Delete" class="btn text-danger"><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{$pros->links()}}
<a href="{{route('admin.addproduct')}}" class="btn btn-success" title="Add"><i class="fas fa-plus pr-2"></i>Add new</a>
@stop