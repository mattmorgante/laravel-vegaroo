<li class="row_item"><a class="article_link" href="/vegan-recipes/{{ $recipe->category }}/{{ $recipe->slug }}">{{ $recipe->title }}</a><br>
    <div class="recipe_extras">
        <span class="price">Calories: {{ $recipe->calories }}</span><br>
        <span class="time">Time: {{ $recipe->time }}</span>
        {{--<span class="nutrition_score">{{ $recipe->score }}/10</span>--}}
    </div>
</li>