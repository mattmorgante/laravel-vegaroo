
<td class="{{ ($amount >= $recommended) ? 'green' : 'red' }}">
    <i class="fas fa-minus-circle" onclick='increment(-1, "v{{$food}}{{$day->id}}")'></i>
    <input size=3 id='v{{$food}}{{$day->id}}' name='v' value='{{ $amount }}'>
    <i class="fas fa-plus-circle" onclick='increment(1, "v{{$food}}{{$day->id}}")'></i>
</td>