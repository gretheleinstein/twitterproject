@extends('layouts.master')

@section('page_title')
Sign Up on Twitter
@stop

@section('other_css')
<link rel="stylesheet" href="{{ URL::asset('css/sub-styles.css') }}" type="text/css">
@stop

@section('nav_bar')
@include('layouts.navbar')
@stop


@section('body_content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-body">
          <form class="ajax-form" action="{{ route('register') }}" method="post">
            @csrf
            <div class="col-md-10 offset-md-2">
            <h4 class="font-weight-bold mb-3 mt-3">Sign up to Twitter</h4>
            <div class="form-group row">
                <label for="full_name" class="col-md-4 col-form-label">Full Name</label>
                <div class="col-md-6">
                    <input id="full_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}">
                    <span class="field_full_name span-error"></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
                    <span class="field_username span-error"></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">
                    <span class="field_password span-error"></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-blue btn-circle form-control" id="btn_register">Register</button>
                </div>
            </div>
          </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          <div class="col-md-10 offset-md-2">
            <span class="light"> Already have an account? </span><a href="{{ route('login') }}">Log in now »</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
