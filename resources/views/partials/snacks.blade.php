<h3 class="section-title" id="snacks">Snacks</h3>
<ul class="flexible_row">
    @foreach ($snacks as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>