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
            <div class="{{ ($day->{"$food->slug"} >= $food->recommended) ? 'green' : '' }} food-card">
                <a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a>
                <br>
                <i class="fas fa-minus-circle" onclick='increment(-1, "{{ $food->slug }}-{{ $day->id }}", "{{ $food->recommended }}")'></i>
                <input class="table-data" disabled size=3 id='{{$food->slug }}-{{$day->id}}' value='{{ $day->{"$food->slug"} }}'> / {{ $food->recommended }}
                <i class="fas fa-plus-circle" onclick='increment(1, "{{ $food->slug }}-{{ $day->id }}", "{{ $food->recommended }}" )'></i>
            </div>
        @endforeach
        </div>

        <h2>Weekly Report</h2>
        <p>Bar Chart</p>


    </div>

@endsection

<script>
    function increment(incrementor, target, recommended) {
        console.log(target);
        var value = parseInt(document.getElementById(target).value);
        value+=incrementor;
        if (value > recommended) {
        } else {
            document.getElementById(target).value = value;

            var data = target.split("-");

            if ( value >= recommended ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#26ce81";
            }

            $.ajax({
                url: "/save2",
                cache: false,
                data: {
                    food: data[0],
                    dayId: data[1],
                    value: value
                }
            })
                    .done(function (response) {
                        console.log(response);
                        console.log('yes');
                    })
                    .fail(function () {
                        console.log("error");
                    });
        }
    }
</script>