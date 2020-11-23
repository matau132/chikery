@extends('admin.master')
@section('title','Update product')
@section('admin-main')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name..." value="{{$prod->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category_id" class="form-control">
            @foreach($cats as $cat)
            <option value="{{$cat->id}}" {{$cat->id==$prod->category_id?'selected':''}}>{{$cat->name}}</option>
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
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$prod->summary}}">
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <div>
        	<textarea name="content" class="form-control" placeholder="..." id="summernote" value="{{$prod->content}}"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Price..." value="{{$prod->price}}">
        @error('price')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <div class="mb-2">
            <img src="{{url('public/uploads/product')}}/{{$prod->image}}" alt="" width="300px">
        </div>
        <input type="file" class="form-control" name="image">
        @error('image')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Image list</label>
        <div class="d-flex flex-wrap mb-1">
            @foreach(json_decode($prod->image_list) as $img_list)
            <img src="{{url('public/uploads/product')}}/{{$img_list}}" alt="" width="30%" height="150px" class="p-1">
            @endforeach
        </div>
        <input type="file" multiple="" class="form-control" name="image_list[]">
        @error('image_list')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop