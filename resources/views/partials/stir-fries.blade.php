<div class="button_row">
    <a href="/vegan-recipes/stir-fries"><span class="styled-link" id="stir-fries">Stir Fries</span></a>
</div>
<ul class="flexible_row" >
    @foreach ($stirFries as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>