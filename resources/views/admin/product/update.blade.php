@extends('admin.master')
@section('title','Update product')
@section('admin-main')
<form method="POST" enctype="multipart/form-data" class="update-pro-form">
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
        <input type="number" class="form-control" name="weight" placeholder="Weight..." value="{{$prod->weight}}">
    </div>
    <div class="form-group mb-1">
        <label for="">Ingredients</label>
        <div class="checkbox_wrapper">
            @foreach($ingres as $ingre)
            <label class="checkbox mr-2" style="font-weight: 500">
                <?php $flag = in_array($ingre->id, $prod_ingres)?'checked':''; ?>
                <input type="checkbox" value="{{$ingre->id}}" name="ingredient[]" {{$flag}}> {{$ingre->name}}
            </label>
            @endforeach
        </div>
    </div>
    <div class="form-group mb-1">
        <label for="">Sizes</label>
        <div class="checkbox_wrapper">
            @foreach($sizes as $size)
            <div class="row mb-2">
                <div class="col-lg-2 col-md-2 col-sm-4 size-label">
                    <label class="checkbox mr-2 product-size-up" style="font-weight: 500">
                        <?php $flag = in_array($size->id, $prod_sizes)?'checked':''; ?>
                        <input type="checkbox" value="{{$size->id}}" name="sizes[]" {{$flag}}> {{$size->name}}
                    </label>
                </div>  
                <div class="col-lg-3 col-md-3 mb-sm-2 mb-md-0">
                    <input type="text" class="form-control" name="size[{{$size->id}}][price]" placeholder="Price..." style="{{$flag!='checked'?'display:none':''}}" value="{{in_array($size->id, $prod_sizes)?$size_dt->where('product_id',$prod->id)->where('size_id',$size->id)->first()->price:null}}">
                </div>  
                <div class="col-lg-3 col-md-3 mb-sm-2 mb-md-0">
                    <input type="text" class="form-control" name="size[{{$size->id}}][sale_price]" placeholder="Sale price..." style="{{$flag!='checked'?'display:none':''}}" value="{{in_array($size->id, $prod_sizes)?$size_dt->where('product_id',$prod->id)->where('size_id',$size->id)->first()->sale_price:null}}">
                </div>  
                <div class="col-lg-3 col-md-3 mb-sm-4 mb-md-0">
                    <input type="text" class="form-control" name="size[{{$size->id}}][quantity]" placeholder="Quantity..." style="{{$flag!='checked'?'display:none':''}}" value="{{in_array($size->id, $prod_sizes)?$size_dt->where('product_id',$prod->id)->where('size_id',$size->id)->first()->quantity:null}}">
                </div>  
            </div>
            @endforeach
            <small id="emailHelp" class="form-text text-danger er_msg" style="display:none">Please fill price if you choose size.</small>
        </div>
    </div>
    <div class="form-group">
        <label for="">Summary</label>
        <input type="text" class="form-control" name="summary" placeholder="Summary..." value="{{$prod->summary}}">
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <div>
        	<textarea name="content" class="form-control" placeholder="..." id="summernote">{{$prod->content}}</textarea>
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
@section('js')
<script>
    $(document).ready(function () {
        $('.product-size-up').click(function(){
            if($(this).children().is(':checked')){
                $(this).parent().siblings().children().css('display','block');
            }
            else{
                $(this).parent().siblings().children().css('display','none');
                $(this).parent().siblings().children().val(null);
            }
        });
        $('.update-pro-form').submit(function () { 
            var flag = true;
            $('.size-label').each(function(){
                if($(this).find('input[type=checkbox]').is(':checked') && $(this).next().children().val()==""){
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