
<td class="{{ ($amount >= $recommended) ? 'green' : '' }}">
    <i class="fas fa-minus-circle" onclick='increment(-1, "v{{$food}}{{$day->id}}")'></i>
    <input class="table-data" disabled size=3 id='v{{$food}}{{$day->id}}' name='v' value='{{ $amount }}'>
    <i class="fas fa-plus-circle" onclick='increment(1, "v{{$food}}{{$day->id}}")'></i>
</td>