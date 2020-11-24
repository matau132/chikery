@extends('admin.master')
@section('title','Add Product detail')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Product</label>
        <select name="product_id" class="form-control">
            @foreach($pros as $pro)
            <option value="{{$cat->id}}">{{$pro->name}}</option>
            @endforeach
        </select>
        @error('product_id')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Ingredient</label>
        <select name="ingredient_id" class="form-control">
            @foreach($ingres as $ingre)
            <option value="{{$ingre->id}}">{{$ingre->name}}</option>
            @endforeach
        </select>
        @error('ingredient_id')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Ingredient quantity</label>
        <input type="number" class="form-control" name="ingredient_quantity" placeholder="Ingredient quantity...">
        @error('ingredient_quantity')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>

@stop