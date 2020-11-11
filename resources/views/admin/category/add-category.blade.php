@extends('admin.master')
@section('title','add-category')
@section('admin-main')
<h1>Admin add category page</h1>
<form action="" method="POST" role="form">
    <legend>Form add new</legend>
    @csrf
    <div class="form-group">
        <label for="">name</label>
        <input type="text" class="form-control" name="name" placeholder="Input name">
    </div>
     @error('name')
    <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
    @enderror
    <div class="form-group">
        <label for="">link</label>
        <input type="text" class="form-control" name="link" placeholder="Input name">
    </div>
     @error('link')
    <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
    @enderror
    <div class="form-group">
        <label for="">sumary</label>
        <input type="text" class="form-control" name="sumary" placeholder="Input name">
    </div>


    <div class="form-group">
        <label for="">image</label>
        <input type="file" class="form-control" name="image" placeholder="Input name">
    </div>
     @error('image')
    <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
    @enderror
    <div class="form-group">
        <label for="">label</label>
        
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0">
                Ẩn
            </label>
            <label>
                <input type="radio" name="status" value="1" checked>
                Hiển thị
            </label>
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary">Add new</button>
</form>
<hr>
@stop