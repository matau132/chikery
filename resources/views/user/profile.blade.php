@extends('user.user_master')
@section('user')
<form action="" method="post" class="form-inline">
    @csrf
    <input type="hidden" name="id" value="{{Auth::guard('customer')->user()->id}}">
    <div class="form-group mb-4">
        <label for="">Name:</label>
        <div style="width: 75%">
            <input type="text" name="name" class="form-control" value="{{Auth::guard('customer')->user()->name}}">
            @error('name')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="">Email:</label>
        <div style="width: 75%">
            <input type="text" name="email" class="form-control" value="{{Auth::guard('customer')->user()->email}}">
            @error('email')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="">Phone:</label>
        <div style="width: 75%">
            <input type="text" name="phone" class="form-control" value="{{Auth::guard('customer')->user()->phone}}">
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="">Address:</label>
        <div style="width: 75%">
            <input type="text" name="address" class="form-control" value="{{Auth::guard('customer')->user()->address}}">
        </div>
    </div>
    <div class="btn-wrapper mt-5">
        <button class="btn btn-success">Save</button>
    </div>
</form>
@stop