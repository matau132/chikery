@extends('admin.master')
@section('title','Update Admin')
@section('admin-main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
     <div class="form-group">
        <label for="">New password</label>
        <input type="password" class="form-control" name="password" placeholder="New password...">
        @error('password')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Confirm password</label>
        <input type="password" class="form-control" name="confirm_pw" placeholder="Confirm password...">
        @error('confirm_pw')
            <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@stop