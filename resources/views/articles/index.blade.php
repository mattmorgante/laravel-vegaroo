@extends('layouts.app')

<title>Resources and articles for the aspiring vegan</title>
<meta name="description" content="Vegaroo has distilled the latest research and data about going vegan into concise articles about why and how to go vegan"/>

@section('content')

@include('partials.nav')


<div class="container">
    <h2>Resources</h2>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a href="/calculator">Calculate The Environmental Impact Of Your Diet</a></h3>
        </div>
    </div>

    @include('partials.why')

    @include('partials.how')
</div>


@endsection