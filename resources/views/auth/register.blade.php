@extends('layouts.app')
@include('partials.nav')
@section('content')
<div class="container">

    <h2>Join Vegaroo</h2>

    <p>Vegaroo is a collection of tools, recipes, and resources to help aspiring vegans live healthier and more conscious lives. Join now to:</p>
    <ul>
        <li>Track your daily and weekly consumption of the <a href="https://nutritionfacts.org/video/dr-gregers-daily-dozen-checklist">Daily Dozen</a>, the healthiest recommended foods from the bestselling book
            <a target="_blank" href="http://amzn.to/2AZGPxU">How Not To Die.</a></li>
        <br>
        <li>Influence the feature development on Vegaroo through providing feedback and suggestions.</li>
        <br>
        <li>Literally nothing else. It's still a <a href="https://trello.com/b/x8TcQZOi/vegaroo-pipeline">work in progress!</a></li>
    </ul>
  </div>

<div class="container-login">
<h2>Let's Get Started!</h2>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" id="name" name="name" class="form__field form-control" placeholder="Name" value="{{ old('name') }}" required autofocus />
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

            <br>
            <h2>Already a member?</h2>
            <button class="login-button">
            <a href="{{ route('login') }}" style="color:#26ce81; text-decoration: none;">
               Login Here
            </a>
            </button>
        </div>
    </form>
</div>
@endsection
