<div class="button_row">
    <a href="/vegan-recipes/breakfasts"><span class="styled-link" id="breakfasts">Breakfasts</span></a>
</div>
<ul class="flexible_row">
    @foreach ($breakfasts as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>