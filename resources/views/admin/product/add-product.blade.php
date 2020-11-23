@extends('admin.master')
@section('title','Add product')
@section('admin-main')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name...">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category_id" class="form-control">
            @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Weight</label>
        <input type="text" class="form-control" name="weight" placeholder="Weight...">
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary...">
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <div>
        	<textarea name="content" class="form-control" placeholder="..." id="summernote"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Price...">
        @error('price')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
        @error('image')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image list</label>
        <input type="file" multiple="" class="form-control" name="image_list[]">
        @error('image_list')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>
@stop