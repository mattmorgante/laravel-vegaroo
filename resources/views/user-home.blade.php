@extends('layouts.app')

@include('partials.nav')
<div class="container">
<div id="success" class="header" style="display: none;">
    <h2>Thanks, your information has been successfully saved!</h2>
</div>

<h2 class="header-dashboard">Daily Report</h2>

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
        <td>Broccoli, cauliflower, crussel cprouts, cabbage</td>
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
    </tr>


@foreach( $last7Days as $day)
    <tr>
        <td>{{ \Carbon\Carbon::parse($day->day)->format('d-m-Y')}}</td>
        <td class="{{ ($day->beans >= '3') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v{{$day->id}}")'>
            <input size=3 id='v{{$day->id}}' name='v' value='{{ $day->beans }}'>
            <input type=button value='+' onclick='increment(1, "v{{$day->id}}")'>
        </td>
        <td class="{{ ($day->greens >= '2') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v2{{$day->id}}")'>
            <input size=3 id='v2{{$day->id}}' name='v' value='{{ $day->greens }}'>
            <input type=button value='+' onclick='increment(1, "v2{{$day->id}}")'>
        </td>
        <td class="{{ ($day->cruciferous >= '1') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v3{{$day->id}}")'>
            <input size=3 id='v3{{$day->id}}' name='v' value='{{ $day->cruciferous }}'>
            <input type=button value='+' onclick='increment(1, "v3{{$day->id}}")'>
        </td>
        <td class="{{ ($day->berries >= '1') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v4{{$day->id}}")'>
            <input size=3 id='v4{{$day->id}}' name='v' value='{{ $day->berries }}'>
            <input type=button value='+' onclick='increment(1, "v4{{$day->id}}")'>
        </td>
        <td class="{{ ($day->fruits >= '3') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v5{{$day->id}}")'>
            <input size=3 id='v5{{$day->id}}' name='v' value='{{ $day->fruits }}'>
            <input type=button value='+' onclick='increment(1, "v5{{$day->id}}")'>
        </td>
        <td class="{{ ($day->vegetables >= '2') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v6{{$day->id}}")'>
            <input size=3 id='v6{{$day->id}}' name='v' value='{{ $day->vegetables }}'>
            <input type=button value='+' onclick='increment(1, "v6{{$day->id}}")'>
        </td>
        <td class="{{ ($day->grains > '2' and $day->grains < '6' ) ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v7{{$day->id}}")'>
            <input size=3 id='v7{{$day->id}}' name='v' value='{{ $day->grains }}'>
            <input type=button value='+' onclick='increment(1, "v7{{$day->id}}")'>
        </td>
        <td class="{{ ($day->flaxseeds >= '1') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v8{{$day->id}}")'>
            <input size=3 id='v8{{$day->id}}' name='v' value='{{ $day->flaxseeds }}'>
            <input type=button value='+' onclick='increment(1, "v8{{$day->id}}")'>
        </td>
        <td class="{{ ($day->nuts > '0' and $day->nuts < '3' ) ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v9{{$day->id}}")'>
            <input size=3 id='v9{{$day->id}}' name='v' value='{{ $day->nuts }}'>
            <input type=button value='+' onclick='increment(1, "v9{{$day->id}}")'>
        </td>
        <td class="{{ ($day->spices >= '1') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v10{{$day->id}}")'>
            <input size=3 id='v10{{$day->id}}' name='v' value='{{ $day->spices }}'>
            <input type=button value='+' onclick='increment(1, "v10{{$day->id}}")'>
        </td>
        <td class="{{ ($day->water >= '8') ? 'green' : 'red' }}">
            <input type=button value='-' onclick='increment(-1, "v11{{$day->id}}")'>
            <input size=3 id='v11{{$day->id}}' name='v' value='{{ $day->water }}'>
            <input type=button value='+' onclick='increment(1, "v11{{$day->id}}")'>
        </td>
        <td><a style="cursor:pointer;" class="btn" onclick="save({{$day->id}})">Save</a></td>
    </tr>
@endforeach

</table>

<br>
<br>
</div>


<script>
    function increment(v, target){
        var value = parseInt(document.getElementById(target).value);
        value+=v;
        document.getElementById(target).value = value;
    }

    function save(dayId) {
        var beans = $('#v'+dayId).val();
        var greens = $('#v2'+dayId).val();
        var cruciferous = $('#v3'+dayId).val();
        var berries = $('#v4'+dayId).val();
        var fruits = $('#v5'+dayId).val();
        var vegetables = $('#v6'+dayId).val();
        var grains = $('#v7'+dayId).val();
        var flaxseeds = $('#v8'+dayId).val();
        var nuts = $('#v9'+dayId).val();
        var spices = $('#v10'+dayId).val();
        var water = $('#v11'+dayId).val();

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