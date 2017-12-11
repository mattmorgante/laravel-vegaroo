<h3 class="section-title" id="smoothies">Smoothies</h3>
<ul class="flexible_row">
    @foreach ($smoothies as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>