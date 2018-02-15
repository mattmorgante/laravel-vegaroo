<a href="/vegan-recipes/smoothies"><h3 class="section-title" id="smoothies">Smoothies</h3></a>
<ul class="flexible_row">
    @foreach ($smoothies as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>