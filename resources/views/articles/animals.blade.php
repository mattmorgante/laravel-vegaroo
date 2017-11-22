@extends('layouts.app')

@section('content')

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
        <h3 class="content"><i>Animals raised for food consumption are raised in inhumane conditions on an incomprehensible scale. From babies taken from their mothers immediately after birth to sick cows pumped full of toxic antibiotics, the meat and dairy industries maim and murder millions every day.</i></h3>
    </div>
</div>

<img class="article_header_image" src="/img/cow.jpeg" alt="Eating Vegan is the easiest way to avoid disease">

<div class="article_wrapper">
    <div class="article_container">

        <p class="content first_content">Every year, more than 56 billion land animals worldwide are killed for human consumption. The vast majority of them live in tiny spaces, never seeing the light of day. A good step in the right direction is to understand more about where your meat and dairy products are sourced from.</p>

        <h2 class="subtitle">Living Conditions</h2>

        <p class="content">More than 99% of animals live in factory farms, where they are bred purely for profit and yield. These animals are confined into tight spaces with poor air quality and unnatural light patterns. Many will never see the light of day.</p>

        <p class="content">A staggering 8.5 billion chickens are killed for meat every year.</p>

        <div class="image_wrapper">
            <img src="/img/chickens.jpg" alt="Chickens in a factory farm" class="image_large">
        </div>

        <p class="content">In the wild, pigs are some of the smartest animals in the food chain. They can form close bonds with members of other species and are highly social animals. That's why it's so excrutiating to learn about how they are treated in factory farms. Mothers have their piglets taken away at 2 to 3 weeks old. Most are placed in windowless sheds without fresh air, sunlight, or even enough room to turn around.</p>

        <div class="image_wrapper">
            <img src="/img/pigs.jpg" alt="Pigs in a factory farm" class="image_large">
        </div>

        <p class="content">Cattle raised for beef have short and difficult lives, as they are often forced to live in confined outdoor conditions with hundreds of thousands of others. Today, most cows consume an diet of grains and soy instead of their natural grass, which causes illness and sometimes death.</p>

        <div class="image_wrapper">
            <img src="/img/feedlot.jpg" alt="A cattle feedlot in California" class="image_large">
        </div>

        <h2 class="subtitle">The Problem With Dairy</h2>

        <p class="content">Although many vegetarians may believe that their actions do not result in the direct killing of animals, that sentiment is deeply untrue.</p>

        <p class="content">Breaking the dairy industry down into its core products reveals a frightening cycle. In order to create milk farmers must artificially inseminate cows, remove the calf from the mother the day it is born, then collect the milk on an industrial scale.</p>

        <div class="image_wrapper">
            <img src="/img/milkingcows.jpg" alt="A cow milking machine" class="image_large">
        </div>

        <p class="content">While the mothers are denied their instinctual desires to be with newborn calves, the males are taken away to become veal and the females become the next generation of dairy cows. This cycle repeats itself every year, procuding horrendous mental and physical results for the cows. 75% of animals who are killed because they can no longer stand on their own are dairy cows.</p>

        <h2 class="subtitle">Lifespan</h2>

        <p class="content">Every kind of animal raised for food production gets brutally murdered as soon as they are large enough to become meat or are no longer productive as milk or egg producers. Most deaths occur without sedatives; factory farms can kill thousands of animals in a day using highly efficient and deadly machines.</p>
        <p class="content"></p>

        <h3 class="chart_title">Comparison of lifespan in months for animals slaughtered for human consumption and their normal lifespans.</h3>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>


        <h2 class="subtitle">Conclusion</h2>

        <p class="content">Meat and dairy products aren't just destroying our health and our environment: they are also inflicting immense amounts of cruelty to billions of sentient beings every year. These practices will only continue if you are complicit in it's existence. Every day, you make choices which have the power to dismantle this industry: choose vegan and </p>

            <p class="content">If you're interested in learning more about this topic, check out the resources and videos below.</p>

        <p class="content">
            Source: USDA
            Source: https://www.aspca.org/animal-cruelty/farm-animal-welfare/animals-factory-farms

        </p>


        <p class="content">Videos https://www.youtube.com/watch?v=L_vqIGTKuQE </p>
        <p class="content">Videos https://www.youtube.com/watch?v=QkPBam3qO34 </p>
    </div>
</div>

<div class="footer_wrapper">
    <div class="footer_container">
        @include('partials.how')
        <br>
        <div class="btn-wrapper">
            <a target="_blank" class="btn" href="/recipes">All Recipes</a>
        </div>
    </div>
</div>


@endsection
