@extends('admin.master')
@section('title','Update banner')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title..." value="{{$banner->title}}">
        @error('title')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$banner->summary}}">
        @error('summary')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Link</label>
        <input type="text" class="form-control" name="link" placeholder="Link..." value="{{$banner->link}}">
        @error('link')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <div class="mb-2">
            <img src="{{url('public/uploads/banner')}}/{{$banner->image}}" alt="" width="300px">
        </div>
        <input type="file" class="form-control" name="image">
        @error('image')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop