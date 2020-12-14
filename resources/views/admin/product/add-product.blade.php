@extends('admin.master')
@section('title','Add product')
@section('admin-main')
<form method="POST" enctype="multipart/form-data" class="add-pro-form">
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
        <input type="number" class="form-control" name="weight" placeholder="Weight...">
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
    <div class="form-group mb-1">
        <label for="">Ingredients</label>
        <div class="checkbox_wrapper">
            @foreach($ingres as $ingre)
            <label class="checkbox mr-2" style="font-weight: 500">
                <input type="checkbox" value="{{$ingre->id}}" name="ingredient[]"> {{$ingre->name}}
            </label>
            @endforeach
        </div>
    </div>
    <div class="form-group mb-1">
        <label for="">Sizes</label>
        <div class="checkbox_wrapper">
            @foreach($sizes as $size)
            <div class="d-flex mb-2 size-label">
                <label class="checkbox mr-2 product-size" style="font-weight: 500;width:10%">
                    <input type="checkbox" value="{{$size->id}}" name="sizes[]"> {{$size->name}}
                </label>
                <input type="text" class="form-control" name="size[{{$size->id}}][price]" placeholder="Price..." style="width:20%;display:none">
            </div>
            @endforeach
            <small id="emailHelp" class="form-text text-danger er_msg" style="display:none">Please fill price if you choose size.</small>
            @error('sizes')
                <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
            @enderror
        </div>
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
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>
@stop

@section('js')
<script>
    $(document).ready(function () {
        $('.product-size').click(function(){
            if($(this).children().is(':checked')){
                $(this).next().css('display','block');
            }
            else{
                $(this).next().css('display','none');
                $(this).next().val(null);
            }
        });
        $('.add-pro-form').submit(function () { 
            var flag = true;
            $('.size-label').each(function(){
                if($(this).find('input[type=checkbox]').is(':checked') && $(this).find('input[type=text]').val()==""){
                    $('.er_msg').css('display','block');
                    flag = false;
                    return false;
                }
                else{
                    $('.er_msg').css('display','none');
                }
            });
            if(!flag){
                return false;
            }
        });
    });
</script>
@stop