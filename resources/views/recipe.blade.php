@extends('layouts.app')

@include('includes.recipe-seo')

@section('header.javascript')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawBasic);

        var carbs = {!! $recipe->carbs !!};
        var protein ={!! $recipe->protein !!};
        var fat = {!! $recipe->fat !!};

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Grams'],
                ['Carbs',     carbs],
                ['Protein',      protein],
                ['Fat',  fat]
            ]);

            var options = {
                legend: {position: 'top'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }


        function drawBasic() {

            var fiber ={!! $recipe->fiber!!};
            var sugar = {!! $recipe->sugar !!};

            var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Grams'],
                ['Fiber', fiber],
                ['Sugar', sugar]
            ]);

            var options = {
                legend: {position: 'none'},
                chartArea: {width: '25%'},
                hAxis: {
                    minValue: 0,
                }
            };

            var chart = new google.visualization.ColumnChart(
                    document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

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
                {{--<p><span class="call-out-small">Cost: </span><br>{{ $recipe->cost }}</p>--}}
                <p><span class="call-out-small">Time: </span><br>{{ $recipe->time }}</p><br>
                <p><span class="call-out-small">Calories: </span><br>{{ $recipe->calories }}</p>
                {{--<p><span class="call-out-small">Nutritional Quality:</span> <br>{{ $recipe->score }} / 10</p>--}}
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
            <h2>Macro Nutrient Information</h2>
            <h3>{{ $recipe->calories }} Calories</h3>
            <div id="piechart" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="row_item" id="micro_graph">
            <h2>Micro Nutrient Information</h2>
            <div id="chart_div" style="width: 100%; height: 300px;"></div>
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
                <div class="upvote" onclick="upvote()">
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

    <div id="share-buttons">
        <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
        </a>

        <a href="https://twitter.com/share?url={{ Request::url() }}&amp;text=Check%20Out%20This%20Recipe%20From%20Vegaroo&amp;hashtags=#vegaroo" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
        </a>

        <a href="mailto:?Subject=Recipe From Vegaroo&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20
        {{ Request::url() }}">
            <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
        </a>

        <a href="http://reddit.com/submit?url={{ Request::url() }}" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
        </a>
    </div>

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
    function logIn() {
        window.location.href = "/register";
    }

    function upvote() {
        var recipeSlug = window.location.href;
        recipeSlug = recipeSlug.substring(recipeSlug.lastIndexOf("/") + 1, recipeSlug.length);
        var currentVotes = document.getElementById('number_of_upvotes').innerHTML;
        currentVotes++;
        document.getElementById('number_of_upvotes').innerHTML = currentVotes;

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
            // already saved, unsave
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
            // save that thang!
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
