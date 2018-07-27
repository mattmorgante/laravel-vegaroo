@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="container">
    <h1>Your suggestions</h1><br>
    @foreach ($suggestions as $suggestion)
    <div class="flexible_row">
        <div class="row_item">
            <h2>{{ $suggestion->text }}</h2>
            <br>
            {{ $suggestion->description }}
        </div>
    </div>
    @endforeach
</div>

<br>
@endsection