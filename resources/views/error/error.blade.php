@extends('master')
@section('title','404 error')
@section('main')
<div class="container">
    <div class="ps-checkout d-block">
        <h1 class="display-2 mb-5">Something's wrong !</h1>
        <a href="{{route('home')}}" class="text-primary"><i class="fa fa-angle-double-left pr-2"></i>Head back Home!</a>
    </div>
</div>
@stop