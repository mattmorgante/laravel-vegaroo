<h3>Snacks</h3>
<ul class="flexible_row" id="snacks">
    @foreach ($snacks as $recipe)
        @include('partials.recipe-box')
    @endforeach
</ul>