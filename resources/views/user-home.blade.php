@extends('layouts.app')

@include('partials.nav')
<h2>Daily Report</h2>

<table>
    <tr>
    </tr>

    <tr>
        <td>Foods</td>
    @foreach ($foods as $food)
        <td>{{ $food->name }}</td>
    @endforeach
    </tr>

    {{--<tr>--}}
        {{--<td>Examples</td>--}}
        {{--@foreach ($foods as $food)--}}
            {{--<td>ToDo: Examples</td>--}}
        {{--@endforeach--}}
    {{--</tr>--}}

    <tr>
        <td>Recommended Servings</td>
        @foreach ($foods as $food)
            <td>{{ $food->recommended }}</td>
        @endforeach
    </tr>





    <tr>
        <td>Actual Servings</td>
        <td id="beans">
            <input type=button value='-' onclick='increment(-1, "v")'>
            <input size=3 id='v' name='v' value='{{ $today->beans }}'>
            <input type=button value='+' onclick='increment(1, "v")'>
        </td>
        <td id="greens">
            <input type=button value='-' onclick='increment(-1, "v2")'>
            <input size=3 id='v2' name='v' value='{{ $today->greens }}'>
            <input type=button value='+' onclick='increment(1, "v2")'>
        </td>
        <td id="cruciferous">
            <input type=button value='-' onclick='increment(-1, "v3")'>
            <input size=3 id='v3' name='v' value='{{ $today->cruciferous }}'>
            <input type=button value='+' onclick='increment(1, "v3")'>
        </td>
        <td id="berries">
            <input type=button value='-' onclick='increment(-1, "v4")'>
            <input size=3 id='v4' name='v' value='{{ $today->berries }}'>
            <input type=button value='+' onclick='increment(1, "v4")'>
        </td>
        <td id="fruits">
            <input type=button value='-' onclick='increment(-1, "v5")'>
            <input size=3 id='v5' name='v' value='{{ $today->fruits }}'>
            <input type=button value='+' onclick='increment(1, "v5")'>
        </td>
        <td id="vegetables">
            <input type=button value='-' onclick='increment(-1, "v6")'>
            <input size=3 id='v6' name='v' value='{{ $today->vegetables }}'>
            <input type=button value='+' onclick='increment(1, "v6")'>
        </td>
        <td id="grains">
            <input type=button value='-' onclick='increment(-1, "v7")'>
            <input size=3 id='v7' name='v' value='{{ $today->grains }}'>
            <input type=button value='+' onclick='increment(1, "v7")'>
        </td>
        <td id="flaxseeds">
            <input type=button value='-' onclick='increment(-1, "v8")'>
            <input size=3 id='v8' name='v' value='{{ $today->flaxseeds }}'>
            <input type=button value='+' onclick='increment(1, "v8")'>
        </td>
        <td id="nuts">
            <input type=button value='-' onclick='increment(-1, "v9")'>
            <input size=3 id='v9' name='v' value='{{ $today->nuts }}'>
            <input type=button value='+' onclick='increment(1, "v9")'>
        </td>
        <td id="spices">
            <input type=button value='-' onclick='increment(-1, "v10")'>
            <input size=3 id='v10' name='v' value='{{ $today->spices }}'>
            <input type=button value='+' onclick='increment(1, "v10")'>
        </td>
        <td id="water">
            <input type=button value='-' onclick='increment(-1, "v11")'>
            <input size=3 id='v11' name='v' value='{{ $today->water }}'>
            <input type=button value='+' onclick='increment(1, "v11")'>
        </td>
    </tr>

</table>

<div class="btn-wrapper">
    <a class="btn" href="/save">Save Today's Information</a>
</div>

<h2>Weekly Report</h2>
<table>
    {{--<tr>--}}
        {{--<th>Foods</th>--}}
        {{--<th scope="col" colspan="2">Monday</th>--}}
        {{--<th scope="col" colspan="2">Tuesday</th>--}}
    {{--</tr>--}}

    <tr>
        <th>Foods</th>
    @foreach ($foodNames as $food)
        <th>{{ $food }}</th>
    @endforeach
    </tr>

    <tr>
        <td>Recommended Servings</td>
        @foreach ($recServings as $recommendation)
            <td>{{ $recommendation }}</td>
        @endforeach
    </tr>

    @foreach( $last7Days as $day)
        <tr>
            <td>{{ $day->day }}</td>
            <td class="{{ ($day->beans >= '3') ? 'green' : 'red' }}">{{ $day->beans }}</td>
            <td class="{{ ($day->greens >= '2s') ? 'green' : 'red' }}">{{ $day->greens }}</td>
            <td class="{{ ($day->cruciferous >= '1') ? 'green' : 'red' }}">{{ $day->cruciferous }}</td>
            <td class="{{ ($day->berries >= '1') ? 'green' : 'red' }}">{{ $day->berries }}</td>
            <td class="{{ ($day->fruits >= '3') ? 'green' : 'red' }}">{{ $day->fruits }}</td>
            <td class="{{ ($day->vegetables >= '2') ? 'green' : 'red' }}">{{ $day->vegetables }}</td>
            <td class="{{ ($day->grains >= '3') ? 'green' : 'red' }}">{{ $day->grains }}</td>
            <td class="{{ ($day->flaxseeds >= '1') ? 'green' : 'red' }}">{{ $day->flaxseeds }}</td>
            <td class="{{ ($day->nuts >= '1') ? 'green' : 'red' }}">{{ $day->nuts }}</td>
            <td class="{{ ($day->spices >= '1') ? 'green' : 'red' }}">{{ $day->spices }}</td>
            <td class="{{ ($day->water >= '8') ? 'green' : 'red' }}">{{ $day->water }}</td>

        </tr>

    @endforeach


</table>


<script>
    function increment(v, target){
        var value = parseInt(document.getElementById(target).value);
        value+=v;
        document.getElementById(target).value = value;
    }

</script>