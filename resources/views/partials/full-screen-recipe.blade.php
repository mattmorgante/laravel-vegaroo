<div class="container">
    <div class="flexible_row">
        <div class="row_item">
            <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                <h2>{{ $recipe->title }}</h2>
                <div class="recipe-info-wrapper">
                    <p>Calories: {{ $recipe->calories }}</p>
                    <p>Time: {{ $recipe->time }}</p>
                </div>
                <p class="recipe-info">{{ $recipe->description }}</p>
            </a>
        </div>
    </div>
</div>