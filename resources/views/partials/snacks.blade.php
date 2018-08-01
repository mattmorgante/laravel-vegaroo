<div class="button_row">
    <a href="/vegan-recipes/snacks"><span class="styled-link" id="snacks">Snacks</span></a>
</div>
<ul class="flexible_row">
    @foreach ($snacks as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>