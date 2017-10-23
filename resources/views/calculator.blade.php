@extends('layouts.app')


<br>
<div class="container" style="text-align: center">
    <div>
        <h1>Calculate the environmental impact of your diet.</h1>
    </div>

    <div>
        <h3>What best describes your diet?</h3>
        <div>
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
    <div class="content">
        <h1 class="title is-2 header">Why to eat Plant-Based</h1>
    </div>
    <div class="columns">
        <div class="column">
            <a href="health.html">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-primary">
                        <p class="title">Improve Your Health</p>
                        <p class="subtitle">Eating less meat has numerous physical and mental health benefits</p>
                    </article>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="environment.html">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-black">
                        <p class="title">Fight Climate Change</p>
                        <p class="subtitle">Animal Agriculture accounts for more than 50% of all greenhouse gas emissions</p>
                    </article>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="animals.html">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-danger">
                        <p class="title">Stop Animal Cruelty</p>
                        <p class="subtitle">More than 56 million animals are brutally killed each year for human consumption</p>
                    </article>
                </div>
            </a>
        </div>

    </div>
    <hr>
    <div class="content">
        <h1 class="title is-2 header">How to eat Plant-Based</h1>
    </div>

    <div class="columns">
        <div class="column">
            <a href="/">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <p class="title">What to eat: With Vegaroo, eating more vegetables and fewer animal products has never been easier</p>
                    </article>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="mindset.html">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-grey">
                        <p class="title">Mastering the Mindset: Make small changes and build healthy habits</p>
                    </article>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="money.html">
                <div class="tile is-parent">
                    <article class="tile is-child notification is-success">
                        <p class="title">Save Money: Eating vegan doesn't have to break the bank. Find out how!</p>
                    </article>
                </div>
            </a>
        </div>
    </div>
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

</body>
</html>
