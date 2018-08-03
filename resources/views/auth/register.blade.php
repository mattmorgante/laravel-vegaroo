@extends('layouts.app')
@include('partials.nav')
@section('content')
<div class="container">

    <h2 style="text-align: center"> Why Join Vegaroo?</h2>

    <div class="hero">
        <div class="hero-list-wrapper">
            <ul class="hero-list">
                <li>&#x2705	Track the <a href="/vegan-foods">Daily Dozen</a></li>
                <li>&#x1F4A1 Receive personalized recipe suggestions</li>
                <li>&#x1F4C8 Weekly Nutrition Reports</li>
                <li>&#x2B50 Save Favorite Recipes</li>
                <li>&#x1F477 Influence new feature development</li>
            </ul>
        </div>
    </div>
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
            <p>Already a member? <a href="{{ route('login') }}" class="link-text">Login here.</a></p>
        </div>
    </form>
</div>
@endsection
