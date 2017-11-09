@extends('layouts.app')

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Cause', 'Rainforest Destruction'],
                ['Meat and Dairy Production',     91],
                ['Everything Else',      9]
            ]);

            var options = {
                title: 'Causes of Amazon Rainforest Destruction'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>


@include('partials.nav')

<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">The Environmental Impact of Animal Foods</h1>
        <h3 class="content">The facts are mounting and the results are undeniable: human consumption of animal products alters the earth in catastrophic ways. Yet every individual can easily make a difference because the most impactful way to join the resistance against climate change is to simply eat fewer animal products.</h3>
        <h3 class="content">How do animal products negatively effect the climate and ecosystems? These are the main drivers:</h3>
    </div>
</div>

<img class="article_header_image" src="/img/plants.jpeg" alt="Plants reduce carbon dioxide in the atmosphere">

<div class="article_wrapper">
    <div class="article_container">
        <h2 class="subtitle">Carbon Dioxide</h2>

        <p class="content">Increasing amounts of greenhouse gasses is one of the leading drivers of global warning.</p>

        <p class="content">The simplest and most impactful way for individuals to lessen their carbon footprint is to reduce the consumption of animal products</p>

        <img src="/img/carbon.png" alt="Carbon Dioxide output of various carbon saving techniques" class="image_large">

        <h2 class="subtitle">Water</h2>

        <p class="content">Fresh water is humanity's most precious resource, and no foods require more water than meat and dairy products.</p>

        <img src="/img/water.png" alt="Water Use of Animal Products" class="image_large">

        <h2 class="subtitle">Forests</h2>

        <p class="content">Trees are one of our biggest allies in regulating the planet's temperature. They trap carbon dioxide and emit clean oxygen, mitigating the effects of global warming.</p>

        <img src="/img/treecycle.jpg" alt="How Trees Make Oxygen and Remove Carbon" class="image_large">

        <p class="content">Yet humanity continues to destroy the world's rainforests at frightening rates. Moreover, animal agriculture is responsible for more than 90% of the Amazon's destruction and is the leading driver of species extinction.</p>

        <div id="piechart" style="width: 100%; height: 400px;"></div>

        <div class="forest_counter">Acres of rainforest destroyed since you opened this page: <span id="acres">0</span></div>

        <h2 class="subtitle">Land Use</h2>

        <p class="content">As the human population grows to 9 billion by 2050, we will have to feed more people with less land. The easiest way to do so is to reduce the amount of land needed per person.</p>

        <img src="/img/land.png" alt="Land Use of Vegans" class="image_land">

        <p class="content">Feeding a regular omnivore requires 18 times as much land as feeding a vegan. As the world's arable land shrinks due to droughts and natural disasters, we can keep the food supply stable by requiring less land to produce our food.</p>

        <h2 class="subtitle">Waste</h2>

        <p class="content">Every minute, 7 million pounds of waste are produced by animals raised for consumption in the U.S. alone. Waste then mixes with nitrogen-based fertilizers to destroy ecosystems both on land and at sea.</p>

        <img src="/img/deadzone.png" alt="Deadzone in the gulf of mexico" class="image_large">

        <div class="forest_counter">Pounds of waste produced by livestock since you opened this page: <span id="waste">0</span></div>


        <h2 class="subtitle">More Resources</h2>
        <p class="content">If you're interested in learning more about this topic, please check out the following resources:</p>

        <h4 class="links">Understand what goes in to a single hamburger</h4>
        <div class="videoWrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ut3URdEzlKQ" frameborder="0" allowfullscreen></iframe>
        </div>

        <h4 class="links"><a href="https://news.llu.edu/for-journalists/press-releases/research-suggests-eating-beans-instead-of-beef-would-sharply-reduce-greenhouse-gasses#overlay-context=user">What would happen if we switched from beef to beans?</a></h4>

    </div>
</div>


<script>
    var sec = 0;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        document.getElementById("acres").innerHTML=pad(++sec);
    }, 1000);

    var seconds = 0;
    function waste ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        document.getElementById("waste").innerHTML=waste((++seconds*116500));
    }, 1000);
</script>