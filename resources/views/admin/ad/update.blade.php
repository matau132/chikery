@extends('admin.master')
@section('title','Update Admin')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name..." value="{{$admin->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email..." value="{{$admin->email}}">
        @error('email')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Phone number</label>
        <input type="number" class="form-control" name="phone" placeholder="Phone..." value="{{$admin->phone}}">
        @error('phone')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address..." value="{{$admin->address}}">
        @error('address')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="mb-2">
        <a href="{{route('admin.AdminPW',$admin->id)}}" title="Change password">Change password</a>
    </div>
    <button type="submit" class="btn btn-primary mt-2 mr-2">Update</button>
    @if(Auth::guard('admin')->check())
    <a href="{{route('admin.deleteAdmin',$admin->id)}}" class="btn btn-danger mt-2" title="Delete"><i class="fas fa-times pr-2"></i></i>Delete</a>
    @endif
</form>
@stop