<div class="button_row">
    <a href="/vegan-recipes/curries"><span class="styled-link" id="curry">Curries</span></a>
</div>
<ul class="flexible_row">
    @foreach ($curries as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>