@extends('admin.master')
@section('title','Update User')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="name" placeholder="Username..." value="{{$user->name}}">
        @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email..." value="{{$user->email}}">
        @error('email')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="mb-2">
        <a href="{{route('admin.UserPW',$user->id)}}" title="Change password">Change password</a>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop