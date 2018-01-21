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
        <td>
            {{--<button onclick="increment(e)">--}}
                {{--Minus--}}
            {{--</button>--}}
            {{ $today->beans }}
            {{--<button>--}}
                {{--Plus--}}
            {{--</button>--}}

        </td>
        <td>{{ $today->greens }}</td>
        <td>{{ $today->cruciferous }}</td>
        <td>{{ $today->berries }}</td>
        <td>{{ $today->fruits }}</td>
        <td>{{ $today->vegetables }}</td>
        <td>{{ $today->grains }}</td>
        <td>{{ $today->flaxseeds }}</td>
        <td>{{ $today->nuts }}</td>
        <td>{{ $today->spices }}</td>
        <td>{{ $today->water }}</td>

    </tr>

</table>


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
    function increment(e) {
        console.log(e)
    }

</script>