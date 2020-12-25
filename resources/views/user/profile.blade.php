@extends('user.user_master')
@section('user')
<?php $user = Auth::guard('customer')->user(); ?>
<form action="" method="post" class="form-inline" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group avatar-wrapper">
        <div class="position-relative avatar">
            <img src="{{url('public/uploads/users')}}/{{$user->avatar}}" alt="" style="width: 70px;height:70px" class="avatar-img">
            <label for="avatar" class="position-absolute"></label>
            <input type="file" class="d-none" id="avatar" name="avatar">
            <i class="fa fa-edit"></i>
        </div>
        <div class="ml-5">
            <p class="font-weight-bold">{{$user->name}}</p>
            <p>Total orders: {{$user->order->count()}} - Delivering: {{$user->order->where('status','=',2)->count()}}</p>
        </div>
    </div>
    <div class="form-group d-flex mb-4">
        <label for="">Name:</label>
        <div style="width: 75%">
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
            @error('name')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="form-group d-flex mb-4">
        <label for="">Email:</label>
        <div style="width: 75%">
            <input type="text" name="email" class="form-control" value="{{$user->email}}">
            @error('email')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="form-group d-flex mb-4">
        <label for="">Phone:</label>
        <div style="width: 75%">
            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
        </div>
    </div>
    <div class="form-group d-flex mb-4">
        <label for="">Address:</label>
        <div style="width: 75%">
            <input type="text" name="address" class="form-control" value="{{$user->address}}">
            @error('avatar')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="btn-wrapper mt-5">
        <button class="btn btn-success">Save</button>
    </div>
</form>
@stop

@section('js')
<script>
    $(document).ready(function () {
       $('input[name=avatar]').change(function(event){
        $('.avatar-img').attr('src',URL.createObjectURL(event.target.files[0]));
       }); 
    });
</script>
@stop