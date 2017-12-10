@extends('layouts.app')

<title>Calculate the Environmental Impact Of Your Diet</title>
<meta name="description" content="An interactive calculator to determine how much your diet costs the world in terms of carbon dioxide, water, land, grain, and waste."/>

@section('content')

@include('partials.nav')
<div class="container" style="text-align: center">
    <h1>Calculate the environmental impact of your diet.</h1>

    <div class="hero-list-wrapper">
    <h3>What best describes your diet?</h3>
            <label>
                <input type="radio" name="diet" onchange="updateValue(0)" checked>Average American (4 servings of meat and dairy per day)
            </label>
            <label>
                <input type="radio" name="diet" onchange="updateValue(1)">Average European (3)
            </label>
            <label>
                <input type="radio" name="diet" onchange="updateValue(2)">Pescatarian (2)
            </label>
            <label>
                <input type="radio" name="diet" onchange="updateValue(3)">Vegetarian (1)
            </label>
            <label>
                <input type="radio" name="diet" onchange="updateValue(4)">Vegan (0)
            </label>
    </div>

    <div class="container">
        <h3>
            Compared to an Average American diet, every day a(n) <br><span id="update_text">Average American</span> will save:
        </h3>
    </div>

    <hr>
    <div class="flexible_row">
        <div class="row_item">
            <p class="title">Carbon Dioxide</p>
            <div class="content widget" style="font-size: 2.5em">0</div>
            <p>Grams</p>
        </div>
        <div class="row_item">
            <p class="title">Water</p>
            <div class="content widget" style="font-size: 2.5em">0</div>
            <p>Liters</p>
        </div>
        <div class="row_item">
            <p class="title">Forest</p>
            <div class="content widget" style="font-size: 2.5em">0</div>
            <p>Square Feet</p>
        </div>
        <div class="row_item">
            <p class="title">Waste</p>
            <div class="content widget" style="font-size: 2.5em">0</div>
            <p>Kilograms</p>
        </div>
        <div class="row_item">
            <p class="title">Animal Lives</p>
            <div class="content widget" style="font-size: 2.5em">0</div>
            <p>Lives</p>
        </div>
    </div>

</div>
<div class="sources_wrapper">
    <div class="sources">
        <h3>Sources</h3>
        <ul>
            <li><a href="https://link.springer.com/article/10.1007/s10584-014-1169-1/fulltext.html">Scarborough, Peter, et al. Dietary greenhouse gas emissions of meat-eaters, fish-eaters, vegetarians and vegans in the UK</a></li>
            <li><a href="http://static.ewg.org/reports/2011/meateaters/pdf/methodology_ewg_meat_eaters_guide_to_health_and_climate_2011.pdf">Meat Eater's Guide to Climate Change and Health</a></li>
            <li><a href="http://www.wri.org/blog/2016/04/sustainable-diets-what-you-need-know-12-charts">Ranganathan, Janet & Waite, Richard. Sustainable Diets: What You Need to Know in 12 Charts</a></li>
            <li><a href="http://www.cowspiracy.com/facts">Cowspiracy:</a> Each day, a person who eats a vegan diet saves 1,100 gallons of water, 45 pounds of grain, 30 sq ft of forested land, 20 lbs CO2 equivalent, and one animal’s life.</li>
        </ul>
    </div>
</div>
<div class="container">
    @include('partials.why')

    @include('partials.how')
</div>


<script>
    // Source: Each day, a person who eats a vegan diet saves 1,100 gallons of water, 45 pounds of grain, 30 sq ft of forested land, 20 lbs CO2 equivalent, and one animal’s life.
    // 4163 liters
    // 20 kg of grain
    // 2.7 sq meters of forest
    // how MANY TREES IS THAT
    // 9 kilograms

    // this should all be divided by four
    const values = [100, 2250, 7.5, 62.5 , .25];

    const phrase = ['Average American', 'Average European', 'Pescatarian','Vegetarian','Vegan'];
    var phraseEl = document.getElementById('update_text');
    var widgets = document.getElementsByClassName('widget');
    var newValues = [];

    function updateValue(slider) {
        // first get the value from the input event listener
        console.log(slider);
        // iterate through $values, defined above
        // foreach i, multiply i by value of slider
        phraseEl.innerHTML = phrase[slider];
        values.forEach(function(value, i) {
            newValues.push(value * slider);
            widgets[i].innerHTML = newValues[i];
        });

        // clear new values
        newValues = [];
    }
</script>


@endsection