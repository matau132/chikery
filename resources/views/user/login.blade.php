@extends('master')
@section('title','Login')
@section('class','ps-page')
@section('main')
<div class="ps-user">
  <div class="container">
    <div class="home-login-wrapper">
      @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session()->get('error')}}</strong> 
      </div>
      @endif
      <form method="post">
        <h3 class="text-center text-white" style="text-shadow: 2px 2px 4px #000000">User Login</h3>
        @csrf
        <div class="form-control">
          <input type="text" name="email" required="">
          <label for="">Email</label>
          @error('email')
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
        <div class="login-btn-wrapper">
          <button type="submit" class="btn">Sign in</button>
        </div>
        <div class="sign-up d-flex justify-content-center mt-4">
          <p class="mr-2 text-dark">Not a member?</p>
          <a href="{{route('user.register')}}" style="color: #ce873a">Sign up</a>
        </div>
      </form>
    </div>
  </div>
</div>
@stop