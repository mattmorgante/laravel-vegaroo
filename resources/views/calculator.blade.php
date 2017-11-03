@extends('layouts.app')

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
    <hr>
    <h3 class="section-title"><span class="call-out">Why</span> To Eat More Fruits and Vegetables</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/environmental-benefits">Join the #resistance against Climate Change</a></li>
        <li class="row_item article_item"><a class="article_link" href="/health-benefits-short-term">Lose Weight and Gain More Energy</a></li>
    </ul>

    <div class="flexible_row">
        <div class="row_item article_item"><a class="article_link" href="/health-benefits-long-term">Prevent Heart Disease, Cancer & more</a></div>
        <div class="row_item article_item">
            <a href="/stop-animal-cruelty" class="article_link">
                Stop Animal Cruelty</a>
        </div>
    </div>

    <h3 class="section-title"><span class="call-out">How</span> To Eat More Fruits and Vegetables</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/vegan-on-a-budget">Eating Vegan On A Budget</a></li>
        <li class="row_item article_item"><a class="article_link" href="/pantry">Stocking Your Pantry As A Vegan</a></li>
        <li class="row_item article_item"><a class="article_link" href="/habits">Building Tiny Habits: Your secret to success as a vegan</a></li>
    </ul>


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

</body>
</html>
