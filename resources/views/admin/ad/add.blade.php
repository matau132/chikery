@extends('admin.master')
@section('title','Add Admin')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name...">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email...">
        @error('email')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Phone number</label>
        <input type="number" class="form-control" name="phone" placeholder="Phone...">
        @error('phone')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address...">
        @error('address')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password...">
        @error('password')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_pw" placeholder="Confirm Password...">
        @error('confirm_pw')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-2">Add new</button>
</form>

@stop