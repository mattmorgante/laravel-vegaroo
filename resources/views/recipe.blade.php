@extends('layouts.app')

@include('includes.recipe-seo')

@section('header.javascript')
    @include('partials.recipe-charts')
@endsection
@section('content')
@include('partials.nav')
<br>
<div class="container">
    <div class="flexible_row">
        <div class="row_item recipe_detail">
            <h1>{{ $recipe->title }}</h1>
            <p>{{ $recipe->description }}</p>
            <div class="recipe_extras">
                <p><span class="call-out-small">Time: </span><br>{{ $recipe->time }}</p><br>
                <p><span class="call-out-small">Calories: </span><br>{{ $recipe->calories }}</p>
                <div class="macro_wrapper">
                    <p>Carbs:<br>{{ $recipe->carbs }}g |  {{ $recipe->carbsPercent }}%&nbsp;&nbsp;&nbsp;</p>
                    <p>Protein:<br>{{ $recipe->protein }}g |  {{ $recipe->proteinPercent }}%&nbsp;&nbsp;</p>
                    <p>Fat:<br>{{ $recipe->fat }}g |  {{ $recipe->fatPercent }}%</p>
                </div>
            </div>
        </div>
        <div class="row_item instructions">
            <h2>Ingredients: </h2>
            @foreach($ingredients as $ingredient )
                <ul>
                    <li>{{ $ingredient }}</li>
                </ul>
            @endforeach
        </div>
        <div class="row_item instructions">
            <h2>Instructions: </h2>
            @foreach($instructions as $i=>$instruction)
                <p>{{$i+1}}. {{$instruction}}</p>
            @endforeach
        </div>
    </div>
    <div class="flexible_row">
        <div class="row_item">
            <h2>Macro Nutrients</h2>
            <h3>{{ $recipe->calories }} Calories</h3>
            <div id="macro_chart" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="row_item" id="micro_graph">
            <h2>Micro Nutrients</h2>
            <div id="micro_chart" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
    <div class="recipe-buttons">
        <div class="right-buttons">
            <div class="save-wrapper">
                <h3>Save this recipe</h3>
            @if ($userId == true)
            <div class="save" onclick="save()">
                <button class="btn">
                    @if ($saved == true)
                        <i id="save-icon" class="fas fa-star"></i><span id="save">Saved!</span>
                    @else
                        <i id="save-icon" class="far fa-star"></i><span id="save">Save</span>
                    @endif
                </button>
            </div>
            @else
                <div class="save" onclick="logIn()">
                    <button class="btn">
                        <i id="save-icon" class="far fa-star"></i><span id="save">Save</span>
                    </button>
                </div>
            @endif
            </div>
            <div class="upvote-wrapper">
                <h3>Upvote</h3>
                <div class="upvote" onclick="isUpvoted()">
                    <button class="btn">
                        <i class="fas fa-caret-up"></i>
                        <span id="number_of_upvotes">{{ $recipe->upvotes }}</span>
                    </button>
                </div>
            </div>
        </div>
      <div class="right-buttons">
          <div class="tags">
          <h3>Tags</h3>
        @foreach ($tags as $tag)
          <a href="/vegan-foods/{{$tag}}"><div class="btn">{{ $tag }}</div></a>
        @endforeach
          </div>
      </div>
    </div>
    @include('partials.share-buttons')
    <div class="container">
        <h2 class="other-recipes">More {{ $categoryName }}</h2>
        <div class="flexible_row">
            @foreach ($similarRecipes as $recipe)
                @include('partials.recipe-box')
            @endforeach
        </div>
        <h2 class="other-recipes">Other Recipes</h2>
        @include('partials.breakfasts')
        @include('partials.grain-bowls')
        @include('partials.curries')
        @include('partials.salads')
        @include('partials.snacks')
        @include('partials.stir-fries')
        @include('partials.smoothies')
    </div>
<br>
</div>
@endsection

<script>
    var upvoted = false;

    function logIn() {
        window.location.href = "/register";
    }

    function isUpvoted() {
        if (upvoted === true) {
            alert('You already did that!');
        } else {
            upvote();
        }
    }

    function upvote() {
        var recipeSlug = window.location.href;
        recipeSlug = recipeSlug.substring(recipeSlug.lastIndexOf("/") + 1, recipeSlug.length);
        var currentVotes = document.getElementById('number_of_upvotes').innerHTML;
        currentVotes++;
        document.getElementById('number_of_upvotes').innerHTML = currentVotes;
        upvoted = true;

        $.ajax({
            url: "/upvote",
            cache: false,
            data: {
                slug: recipeSlug
            }
        })
            .done(function(response) {
                console.log('success!');
                console.log(response);
            })
            .fail(function() {
                console.log('failure');
            });
    }
</script>

<script>
    function save() {
        var saveEl = document.getElementById("save-icon");
        var iconType = saveEl.getAttribute("data-prefix");
        var recipeSlug = window.location.href;
        recipeSlug = recipeSlug.substring(recipeSlug.lastIndexOf("/") + 1, recipeSlug.length);

        if ( iconType === 'fas' ) {
            document.getElementById("save-icon").classList.add("far");
            document.getElementById("save").innerHTML="Save";
            $.ajax({
                url: "/unsave-recipe",
                cache: false,
                data: {
                    slug: recipeSlug,
                    userId: {{ $userId }}
                }
            })
                .done(function (response) {
                    console.log('success!');
                    console.log(response);
                })
                .fail(function () {
                    console.log('failure');
                });
        } else {
            document.getElementById("save-icon").classList.add("fas");
            document.getElementById("save").innerHTML = "Saved!";

            $.ajax({
                url: "/save-recipe",
                cache: false,
                data: {
                    slug: recipeSlug,
                    userId: {{ $userId }}
                }
            })
                .done(function (response) {
                    console.log('success!');
                    console.log(response);
                })
                .fail(function () {
                    console.log('failure');
                });
        }
    }
</script>