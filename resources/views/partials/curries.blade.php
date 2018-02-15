<a href="/vegan-recipes/curries"><h3 class="section-title" id="curry">Curries</h3></a>
<ul class="flexible_row">
    @foreach ($curries as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>