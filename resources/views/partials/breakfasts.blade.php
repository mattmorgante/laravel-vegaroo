<h3 class="section-title" id="breakfasts">Breakfasts</h3>
<ul class="flexible_row">
    @foreach ($breakfasts as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>