<a href="/vegan-recipes/bowls"><h3 class="section-title" id="grainbowls">Grain Bowls</h3></a>
<ul class="flexible_row">
    @foreach ($bowls as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>