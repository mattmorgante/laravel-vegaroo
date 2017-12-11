<h3 class="section-title" id="stir-fries">Stir Fries</h3>
<ul class="flexible_row" >
    @foreach ($stirFries as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>