@extends('admin.master')
@section('title','add-blog')
@section('admin-main')
<h1>Admin add blog page</h1>
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
        <label for="">content</label>
        <div>
        	<textarea name="content" rows="2" cols="130"></textarea>
        </div>
    </div>
     @error('content')
    <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
    @enderror
    <div class="form-group">
        <label for="">image</label>
        <input type="file" class="form-control" name="name" placeholder="Input name">
    </div>
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