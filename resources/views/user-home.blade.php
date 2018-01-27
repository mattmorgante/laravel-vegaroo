@extends('layouts.app')

@include('partials.nav')
@section('content')
<div id="success" class="header" style="display: none;">
    <h2>Thanks, your information has been successfully saved! Refresh to update all the colors.</h2>
</div>

<table>

    <tr>
        <td>Foods</td>
    @foreach ($foods as $food)
        <td><a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a></td>
    @endforeach
    </tr>

    <tr>
        <td>Examples</td>
        <td>Black beans, kidney beans, chickpeas, hummus, tempeh, lentils, edamame</td>
        <td>Spinach, arugula, kale, swiss chard</td>
        <td>Broccoli, cauliflower, brussel sprouts, cabbage</td>
        <td>Blueberries, strawberries, raspberries, blackberries</td>
        <td>Apples, bananas, oranges, dates, pineapple, lemons, limes</td>
        <td>Eggplant, Zucchini, Asparagus, Carrots, Squash, Tomatoes, etc</td>
        <td>Whole-grain bread, rice, bulgur, quinoa, popcorn, oats, whole-wheat pasta</td>
        <td>Uhh...yeah, only flaxseeds</td>
        <td>Almonds, walnuts, cashews, pistachios, chia seeds, sesame seeds, sunflower seeds</td>
        <td>Curry powder, cumin, cinnamon, turmeric, paprika, oregano, nutmeg</td>
        <td>Tea or water</td>
    </tr>

    <tr>
        <td>Recommended Servings</td>
        @foreach ($foods as $food)
            <td>{{ $food->recommended }}</td>
        @endforeach
        <td>Daily Progress</td>
    </tr>


@foreach( $last7Days as $day)
    <tr>
        <td>{{ \Carbon\Carbon::parse($day->day)->format('d-m-Y')}}</td>

        @include('partials.table-data', ['food' => 'beans', 'amount' => $day->beans, 'recommended' => 3])
        @include('partials.table-data', ['food' => 'greens', 'amount' => $day->greens, 'recommended' => 2])
        @include('partials.table-data', ['food' => 'cruciferous', 'amount' => $day->cruciferous, 'recommended' => 1])
        @include('partials.table-data', ['food' => 'berries', 'amount' => $day->berries, 'recommended' => 1])
        @include('partials.table-data', ['food' => 'fruits', 'amount' => $day->fruits, 'recommended' => 3])
        @include('partials.table-data', ['food' => 'vegetables', 'amount' => $day->vegetables, 'recommended' => 2])
        @include('partials.table-data', ['food' => 'grains', 'amount' => $day->grains, 'recommended' => 3])
        @include('partials.table-data', ['food' => 'flaxseeds', 'amount' => $day->flaxseeds, 'recommended' => 1])
        @include('partials.table-data', ['food' => 'nuts', 'amount' => $day->nuts, 'recommended' => 1])
        @include('partials.table-data', ['food' => 'spices', 'amount' => $day->spices, 'recommended' => 1])
        @include('partials.table-data', ['food' => 'water', 'amount' => $day->water, 'recommended' => 8])
        <td>{{ $day->percentage }}%</td>
        <td><a style="cursor:pointer;" class="btn" onclick="save({{$day->id}})">Save</a></td>
    </tr>
@endforeach

</table>

<br>
<br>


<script>
    function increment(incrementor, target){
        var value = parseInt(document.getElementById(target).value);
        value+=incrementor;
        document.getElementById(target).value = value;
    }

    function save(dayId) {
        var beans = $('#vbeans'+dayId).val();
        var greens = $('#vgreens'+dayId).val();
        var cruciferous = $('#vcruciferous'+dayId).val();
        var berries = $('#vberries'+dayId).val();
        var fruits = $('#vfruits'+dayId).val();
        var vegetables = $('#vvegetables'+dayId).val();
        var grains = $('#vgrains'+dayId).val();
        var flaxseeds = $('#vflaxseeds'+dayId).val();
        var nuts = $('#vnuts'+dayId).val();
        var spices = $('#vspices'+dayId).val();
        var water = $('#vwater'+dayId).val();

        var allFoods = {
            beans: beans,
            greens: greens,
            cruciferous: cruciferous,
            berries: berries,
            fruits: fruits,
            vegetables: vegetables,
            grains: grains,
            flaxseeds: flaxseeds,
            nuts: nuts,
            spices: spices,
            water: water
        };

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
@endsection