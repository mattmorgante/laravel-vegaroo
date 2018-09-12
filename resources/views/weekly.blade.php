@extends('layouts.app')

<title>Vegaroo Weekly Dashboard</title>
<meta name="description" content="Track the daily dozen and save your progress over time"/>

@include('partials.nav')
@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['Food', '% Consumed'],
            ['Beans', {{ $week['Beans'] }}],
            ['Greens', {{ $week['Greens'] }}],
            ['Cruciferous', {{ $week['Cruciferous'] }}],
            ['Berries', {{ $week['Berries'] }}],
            ['Fruits', {{ $week['Fruits'] }}],
            ['Vegetables', {{ $week['Vegetables'] }}],
            ['Grains', {{ $week['Grains'] }}],
            ['Flaxseeds', {{ $week['Flaxseeds'] }}],
            ['Nuts', {{ $week['Nuts'] }}],
            ['Spices', {{ $week['Spices'] }}],
            ['Water', {{ $week['Water'] }}],
            ['Exercise', {{ $week['Exercise'] }}]
        ]);

        var options = {
            title: 'Percentage Of Each Food\u0027s Recommended Servings Consumed (Last 7 Days)',
            legend: { position: "none" },

            hAxis: {
                minValue: 0,
                maxValue: 100
            },
            vAxis: {
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Day', '% of Total'],
            ['{{ $days[6] or 0 }}',  {{ $percentage[6] or 0 }}],
            ['{{ $days[5] or 0 }}',  {{ $percentage[5] or 0 }}],
            ['{{ $days[4] or 0 }}',  {{ $percentage[4] or 0 }}],
            ['{{ $days[3] or 0 }}',  {{ $percentage[3] or 0 }}],
            ['{{ $days[2] or 0 }}',  {{ $percentage[2] or 0 }}],
            ['{{ $days[1] or 0 }}',  {{ $percentage[1] or 0 }}],
            ['{{ $days[0] or 0 }}',  {{ $percentage[0] or 0 }}]
        ]);

        var options = {
            title: 'Percentage of Total Recommended Servings Consumed',
            legend: { position: "none" },
            vAxis: {minValue: 0, maxValue:100}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
    }
</script>

<div class="container">
  <div class="user-nav">
    <a href="/home">Daily</a>
    <a class="active-nav-item" href="#">Weekly</a>
    <a href="/profile">Saved Recipes</a>
  </div>
  <div class="header-inline">
      <div>
        <h2 class="other-recipes">Week Score</h2>

        <p id="week-score">{{ $weekScore }}%</p>
      </div>

    <div>
      <h2 class="other-recipes">This week's top 3 categories for improvement:</h2>
      <div class="tags">
      @foreach ($recommendedRecipes as $name => $recipeCollection)
        @if ($loop->index < 3)
            <a href="/vegan-foods/{{$name}}"><div class="btn food-button">{{ $name }}</div></a>
        @endif
      @endforeach
      </div>
    </div>
  </div>


  <div id="chart_div2" style="width: 100%; height: 500px"></div>
  <div id="chart_div" style="width: 100%; height: 500px;"></div>

  <br>

  @foreach ($recommendedRecipes as $name => $recipeCollection)
    @if($loop->index < 3)
        @if (count($recipeCollection) != 0 )
          <h2>Recipes with {{ $name }}</h2>
          <div class="flexible_row">
          @foreach ($recipeCollection as $recipe)
              @include('partials.recipe-box')
          @endforeach
          </div>
        @endif
    @endif
  @endforeach
</div>
<br>


@endsection
