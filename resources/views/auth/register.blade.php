@extends('layouts.app')
@include('partials.nav')
@section('content')

<div class="register_wrapper">
    <div class="container-login">
    <h2>Let's Get Started!</h2>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" id="name" name="name" class="form__field form-control" placeholder="Full Name" value="{{ old('name') }}" required autofocus />
                @if ($errors->has('name'))
                    <br>
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" id="email" name="email" class="form__field form-control" placeholder="Your E-Mail Address" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <br>
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="password" name="password" class="form__field form-control" placeholder="Password" required  />
                @if ($errors->has('password'))
                    <br>
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form__field form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <br>
            <div class="container-login form-group">
                <button class="login-button" type="submit">
                    Register
                </button>
                <p>Already a member? <a href="{{ route('login') }}" class="link-text">Login here.</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
