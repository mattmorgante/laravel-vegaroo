@extends('layouts.app')

@section('content')
@include('partials.nav')
<div class="container">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <h2>
                    <label for="email">Enter Your E-Mail Address</label>
                </h2>

                <div class="col-md-6">
                    <input id="email" type="email" class="form__field form-control" placeholder="Your E-Mail Address" name="email" value="{{ old('email')
                    }}" required>

                    @if ($errors->has('email'))
                        <br>
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn">
                    Send Password Reset Link
                </button>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection
