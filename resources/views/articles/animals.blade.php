@extends('layouts.app')

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Animal', 'Lifespan', 'Normal Lifespan'],
                ['Chickens', 1.5, 60],
                ['Turkeys', 6, 48],
                ['Pigs', 6, 96],
                ['Beef Cattle', 18, 252],
                ['Dairy Cattle', 60, 252]
            ]);

            var options = {
                chart: {
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>
@include('partials.nav')


<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">Stop The Global Slaughter</h1>
        <h3 class="content"><i>Animals raised for food consumption are raised in inhumane conditions on an incomprehensible scale. From babies being taken from their mothers immediately after birth to sick cows being pumped full of toxic antibiotics, the meat and dairy industries maim and murder millions every day.</i></h3>
    </div>
</div>

<img class="article_header_image" src="/img/cow.jpeg" alt="Eating Vegan is the easiest way to avoid disease">

<div class="article_wrapper">
    <div class="article_container">

        <h2 class="subtitle">The Research</h2>

        <p class="content">Every year, more than 56 billion land animals worldwide are killed for human consumption. The vast majority of them live in tiny spaces, never seeing the light of day. A good step in the right direction is to understand more about where your meat and dairy products are sourced from.

        </p>

        <p class="content">
        Yet even "organic" or "grass-fed" animals lead painfully short lives compared to their average normal lifespan.
        </p>

        <h3 class="chart_title">Comparison of lifespan in months for animals slaughtered for human consumption and their normal lifespans.</h3>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

        <p class="content">
            Source: USDA

        </p>
    </div>
</div>



