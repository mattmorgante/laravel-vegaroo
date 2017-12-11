<h3 class="section-title" id="salads">Salads</h3>
<ul class="flexible_row">
    @foreach ($salads as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>