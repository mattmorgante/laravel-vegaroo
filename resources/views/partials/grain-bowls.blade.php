<h3 class="section-title" id="grainbowls">Grain Bowls</h3>
<ul class="flexible_row">
    @foreach ($bowls as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>