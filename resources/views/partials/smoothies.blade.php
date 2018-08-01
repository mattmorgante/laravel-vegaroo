<div class="button_row">
    <a href="/vegan-recipes/smoothies"><span class="styled-link" id="smoothies">Smoothies</span></a>
</div><ul class="flexible_row">
    @foreach ($smoothies as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>