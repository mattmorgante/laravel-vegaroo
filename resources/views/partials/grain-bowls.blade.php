<div class="button_row">
    <a href="/vegan-recipes/bowls"><span class="styled-link" id="grainbowls">Grain Bowls</span></a>
</div>
<ul class="flexible_row">
    @foreach ($bowls as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>