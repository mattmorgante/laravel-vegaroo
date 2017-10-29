<li class="row_item"><a href="/recipes/{{ $recipe->slug }}">{{ $recipe->title }}</a><br>
    <div class="recipe_extras">
        <span class="price">{{ $recipe->cost }}</span>
        <span class="time">{{ $recipe->time }}</span>
        <span class="nutrition_score">{{ $recipe->score }}/10</span>
    </div>
</li>