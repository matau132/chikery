@extends('master')
@section('title','Sign up')
@section('class','ps-page')
@section('main')
<div class="ps-user">
  <div class="container">
    <div class="home-login-wrapper">
      <form method="post" class="register-form">
        <h3 class="text-center text-white" style="text-shadow: 2px 2px 4px #000000">User Register</h3>
        @csrf
        <div class="form-control">
            <input type="text" name="name" required="">
            <label for="">Name</label>
            @error('name')
                <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
            @enderror
        </div>
        <div class="form-control">
          <input type="text" name="email" required="">
          <label for="">Email</label>
          @error('email')
              <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
          @enderror
        </div>
        <div class="form-control">
            <input type="text" name="phone" required="">
            <label for="">Phone Number</label>
            @error('phone')
                <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
            @enderror
        </div>
        <div class="form-control">
            <input type="text" name="address" required="">
            <label for="">Address</label>
            @error('address')
                <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
            @enderror
        </div>
        <div class="form-control">
          <input type="password" name="password" required="">
          <label for="">Password</label>
          @error('password')
                <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
          @enderror
        </div>
        <div class="form-control">
            <input type="password" name="confirm_pw" required="">
            <label for="">Confirm Password</label>
            @error('confirm_pw')
                  <small id="emailHelp" class="form-text text-danger mt-3">{{$message}}.</small>
            @enderror
        </div>
        <div class="login-btn-wrapper">
          <button type="submit" class="btn">Sign up</button>
        </div>
      </form>
  </div>
</div>
@stop