@extends('layouts.app')

<title>Resources and articles for the aspiring vegan</title>
<meta name="description" content="Vegaroo has distilled the latest research and data about going vegan into concise articles about why and how to go vegan"/>

@section('content')

@include('partials.nav')

<div class="container">
    <h3 class="section-title">Tools from Vegaroo</h3>
    @include('partials.tools')
</div>
@endsection
