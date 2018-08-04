@extends('layouts.master')

@section('page_title')
Twitter. It's what happening.
@stop

@section('other_css')
<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css">
@stop

@section('body_content')
<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center pt-3 pb-3" id="div1">
      <div class="container d-flex justify-content-center">
        <div class="col-xs-12 col-lg-8 heading">
          <img src="{{ asset('images/icons/follow.png') }}" alt=""><span class="ml-4">Follow your interests.</span><br><br><br>
          <img src="{{ asset('images/icons/group.png') }}" alt=""><span class="ml-2">Hear what people are talking about.</span><br><br><br>
          <img src="{{ asset('images/icons/chat.png') }}" alt=""><span class="ml-4">Join the conversation.</span>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center pt-3 pb-3">
      <div class="container d-flex justify-content-center">
        <div class="col-lg-7">
          <img src="{{ asset('images/logo/twitter_logo.png') }}" alt="" width="50px" height="50px"><br>
          <p class="font-weight-bold mb-5 big-text">See what’s happening in the world right now.</p>
          <h5 class="font-weight-bold mb-3">Join Twitter today.</h5>
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/home') }}" class="btn btn-circle btn-blue form-control" >Back to my Account</a>
              @else
              <a href="{{ route('register') }}" class="btn btn-circle btn-blue form-control mb-3" >Sign Up</a>
              <a href="{{ route('login') }}" class="btn btn-circle btn-outline-blue form-control" >Login</a>
            @endauth
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@stop
