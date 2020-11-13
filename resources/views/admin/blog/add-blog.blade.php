@extends('admin.master')
@section('title','Add blog')
@section('admin-main')

<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title...">
        @error('title')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary...">
        @error('summary')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <div>
        	<textarea name="content" rows="2" cols="130" class="form-control" placeholder="..."></textarea>
        </div>
        @error('content')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="name" placeholder="Input name">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>

@stop