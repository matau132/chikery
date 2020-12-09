@extends('admin.master')
@section('title','Update blog')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title..." value="{{$blog->title}}">
        @error('title')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$blog->summary}}">
        @error('summary')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <div>
        	<textarea name="content" rows="2" cols="130" class="form-control" placeholder="..."  id="summernote">{{$blog->content}}</textarea>
        </div>
        @error('content')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Admin ID</label>
        <input type="text" class="form-control" name="admin_id" placeholder="Admin ID...">
        @error('admin_id')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <div class="mb-2">
            <img src="{{url('public/uploads/blog')}}/{{$blog->image}}" alt="" width="300px">
        </div>
        <input type="file" class="form-control" name="name" placeholder="Input name">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop