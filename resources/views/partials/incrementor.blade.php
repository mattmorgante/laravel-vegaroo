<td id="{{ $foodName }}">
    <input type=button value='-' onclick='increment(-1, "{{ $value }}")'>
    <input size=3 id='v' name='v' value='{{ $current }}'>
    <input type=button value='+' onclick='increment(1, "{{ $value }}")'>
</td>