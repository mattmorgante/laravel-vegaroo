<li class="row_item"><a class="article_link" href="/vegan-recipes/{{ $recipe->category }}/{{ $recipe->slug }}">{{ $recipe->title }}</a><br>
    <div class="recipe_extras">
        @if($recipe->calories == 'It varies')
            <span class="price">Calories will vary</span><br>
        @else
            <span class="price">{{ $recipe->calories }} Calories</span><br>
        @endif
        <span class="time">{{ $recipe->time }}</span>
    </div>
</li>