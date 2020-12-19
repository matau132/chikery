@extends('user.user_master')
@section('user')
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close" style="bottom: 0">
            <span aria-hidden="true" style="font-family: inherit;font-size: 2.5rem;padding: 7px 12.5px">&times;</span>
        </button>
        <strong>{{session()->get('success')}}</strong> 
    </div>
@endif
<form action="" method="post" class="form-inline">
    @csrf
    <input type="hidden" name="id" value="{{Auth::guard('customer')->user()->id}}">
    <div class="form-group mb-4">
        <label for="">New password:</label>
        <div style="width: 75%">
            <input type="password" name="password" class="form-control">
            @error('password')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="">Confirm password:</label>
        <div style="width: 75%">
            <input type="password" name="confirm_pw" class="form-control">
            @error('confirm_pw')
                <small id="emailHelp" class="form-text  text-danger mt-3" style="font-size: 1.5rem">{{$message}}.</small>
            @enderror
        </div>
    </div>
    <div class="btn-wrapper mt-5">
        <button class="btn btn-success">Change</button>
    </div>
</form>
@stop