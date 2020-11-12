@extends('admin.master')
@section('title','Add banner')
@section('admin-main')
<form action="" method="POST" role="form">
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
        <label for="">Link</label>
        <input type="text" class="form-control" name="link" placeholder="Link...">
        @error('link')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>

@stop