@extends('admin.master')
@section('title','add-banner')
@section('admin-main')
<h1>Admin add banner page</h1>
<form action="" method="POST" role="form">
    <legend>Form add new</legend>
    @csrf
     <div class="form-group">
        <label for="">title</label>
        <input type="text" class="form-control" name="title" placeholder="Input name">
    </div>
     @error('title')
    <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
    @enderror
    <div class="form-group">
        <label for="">sumary</label>
        <input type="text" class="form-control" name="sumary" placeholder="Input name">
    </div>
     @error('sumary')
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