@extends('layouts.app')

@include('partials.nav')
@section('content')
    <div class="container">
        <h2>Header Info</h2>
        <p>Daily Progress = {{ $day->percentage }}% </p>
        <p>Date picker = on select, go to route with new date</p>
        <h2>Cards</h2>



        <div class="card-wrapper">
        @foreach ($foods as $food)
            @include('partials.food-card', ['slug' => $food->slug])
        @endforeach
        </div>

        <h2>Weekly Report</h2>
        <p>Bar Chart</p>


    </div>

@endsection

<script>
    function goToDate(e) {
//        parse date and go to route with this date (2018-01-02)
{{--//        "{{URL::to('home')}}"--}}
        // use jquery date picker and redirect using window.location.href = /
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