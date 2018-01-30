<div class="food-card">
    <a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a>
    <br>
    <span> Eaten so far: {{ $day->{"$slug"} }}</span>
    <br>
    <span>Recommended = {{ $food->recommended }}</span>
</div>