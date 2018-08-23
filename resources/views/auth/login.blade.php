@extends('layouts.app')
@include('partials.nav')
@section('content')
<div class="container-login">
<h2>Welcome Back!</h2>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" id="email" name="email" class="form__field form-control" placeholder="Your E-Mail Address" value="{{ old('email') }}" required autofocus />

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" id="password" name="password" class="form__field form-control" placeholder="Password" required  />

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>

        <div class="container-login form-group">
            <button class="login-button" type="submit">
                Login
            </button>
            <br>

            <a href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>

            <br>
        </div>
    </form>
    <h2>Not a member yet?</h2>
    <div class="btn-wrapper">
        <a class="btn" href="/register">Join Vegaroo</a>
    </div>
    <br>
    <br>
</div>
@endsection
