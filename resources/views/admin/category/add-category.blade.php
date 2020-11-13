@extends('admin.master')
@section('title','Add category')
@section('admin-main')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name...">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
     
    <div class="form-group">
        <label for="">Link</label>
        <input type="text" class="form-control" name="link" placeholder="Link...">
        @error('link')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
   
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary...">
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" placeholder="">
        @error('image')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>

@stop