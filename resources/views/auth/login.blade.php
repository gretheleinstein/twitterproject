@extends('layouts.master')

@section('page_title')
Login on Twitter
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
          <form class="" action="{{ route('login') }}" method="post">
            @csrf
            <div class="col-md-10 offset-md-2">
            <h4 class="font-weight-bold mb-3 mt-3">Log in to Twitter</h4>
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8">
                <button type="submit" class="btn btn-blue btn-circle">Log in</button>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          <div class="col-md-10 offset-md-2">
            <span class="light"> New to Twitter? </span><a href="{{ route('register') }}">Sign up now »</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
