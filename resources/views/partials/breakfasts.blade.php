<a href="/vegan-recipes/breakfasts"><h3 class="section-title" id="breakfasts">Breakfasts</h3></a>
<ul class="flexible_row">
    @foreach ($breakfasts as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>