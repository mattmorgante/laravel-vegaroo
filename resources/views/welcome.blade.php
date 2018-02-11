@extends('layouts.app')

@include('partials.nav')
@section('content')

<div class="container">
  <div class="user-nav">
    <a href="/home">Daily Dashboard</a>
    <a href="/weekly">Weekly Report</a>
    <a class="active-nav-item" href="#">Welcome</a>
  </div>
  <h2>Welcome </h2>
</div>


@endsection
