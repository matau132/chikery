@extends('admin.master')
@section('title','Update shipping')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name..." value="{{$ship->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price..." value="{{$ship->price}}">
        @error('price')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop