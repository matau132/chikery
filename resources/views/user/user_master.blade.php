@extends('master')
@section('title','User Managerment')
@section('class','ps-page')
@section('main')
<div style="padding: 80px 0" class="user-profile-wrapper">
  <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <h3 class="mb-5">User managerment</h3>
            <div class="mb-5 mb-md-0">
                <a href="{{route('user.profile')}}" class="d-block user-nav {{Str::contains(Request::route()->getName(),'profile') ? 'active' : ''}}">My profile</a>
                <a href="{{route('user.order')}}" class="d-block user-nav {{Str::contains(Request::route()->getName(),'order') ? 'active' : ''}}">My order</a>
                <a href="{{route('user.change_pw')}}" class="d-block user-nav {{Str::contains(Request::route()->getName(),'change_pw') ? 'active' : ''}}">Change password</a>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            
            @yield('user')

        </div>
    </div>
  </div>
</div>
@stop