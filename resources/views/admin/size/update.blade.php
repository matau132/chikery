@extends('admin.master')
@section('title','Update size')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name..." value="{{$size->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$size->summary}}">
        @error('summary')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop