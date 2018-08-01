<div class="button_row">
    <a href="/vegan-recipes/salads"><span class="styled-link" id="salads">Salads</span></a>
</div>
<ul class="flexible_row">
    @foreach ($salads as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>