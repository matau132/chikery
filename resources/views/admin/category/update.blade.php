@extends('admin.master')
@section('title','Update category')
@section('admin-main')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name..." value="{{$cat->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
     
    <div class="form-group">
        <label for="">Link</label>
        <input type="text" class="form-control" name="link" placeholder="Link..." value="{{$cat->link}}">
        @error('link')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
   
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$cat->summary}}">
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <div class="mb-2">
            <img src="{{url('public/uploads/category')}}/{{$cat->image}}" alt="" width="300px">
        </div>
        <input type="file" class="form-control" name="image" placeholder="">
        @error('image')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop