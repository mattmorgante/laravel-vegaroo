@extends('layouts.app')

@include('partials.nav')
@section('content')
    <div class="container">
        <h2>Daily Progress</h2>
        <p>Here we need percentage of daily progress</p>
        <p>Date picker = on select, go to route with new date</p>
        @foreach ($foods as $food)
            <div class="food-card">
                @include('partials.table-data', ['food' => $food->name, 'amount' => $today->food, 'recommended' => $food->recommended])
                <a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a>
            </div>
        @endforeach

        <h2>Weekly Report</h2>
        <p>Bar Chart</p>


    </div>

@endsection

<script>
    function goToDate(e) {
//        parse date and go to route with this date (2018-01-02)
    }

    {{-- on update, ajax to back end with food and day --}}
    function increment(incrementor, target){
        var value = parseInt(document.getElementById(target).value);
        value+=incrementor;
        document.getElementById(target).value = value;

        var dayId = 1;
        var allFoods = [];

        $.ajax({
            url: "/save",
            data: {
                dayId: dayId,
                newValues: allFoods
            }
        })
                .done(function (response) {
                    console.log(response);
                    console.log('yes');
                    $('#success').show();
                    window.scrollTo(0, 0);

                })
                .fail(function () {
                    console.log("error");
                });
    }
</script>