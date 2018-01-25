@extends('layouts.app')

@section('content')
<div class="container-login">
<h2>Let's Get Started!</h2>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" id="name" name="name" class="form__field form-control" placeholder="Name" value="{{ old('name') }}" required autofocus />
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

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
            <input id="password-confirm" type="password" class="form__field form-control" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <br>

        <div class="container-login form-group">
            <button class="login-button" type="submit">
                Register
            </button>

            <br>

            <a href="{{ route('login') }}">
                Already Have An Account? Login Here
            </a>
        </div>
    </form>
</div>
@endsection
