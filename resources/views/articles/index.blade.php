@extends('layouts.app')

<title>Resources and articles for the aspiring vegan</title>
<meta name="description" content="Vegaroo has distilled the latest research and data about going vegan into concise articles about why and how to go vegan"/>

@section('content')

@include('partials.nav')

<div class="container">
    @include('partials.why')
    @include('partials.how')
    <div class="hero">
        <h3 class="title">Tools</h3>
    </div>
    @include('partials.tools')
</div>
@endsection
