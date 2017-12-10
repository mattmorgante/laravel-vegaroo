@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">The Vegaroo Nutrition Manifesto</h1>
        <h2 class="content"><i>Nutrition is an evolving science. Despite vast progress, we still don't know everything about what constitutes the word "healthy." That being said, we can set some ground rules based on the scientific knowledge currently available.</i></h2>
    </div>
</div>
<br>
<img class="article_header_image" src="/img/veg.jpeg" alt="What to eat and why: the Vegaroo Nutrition Manifesto">

<div class="article_wrapper">
    <div class="article_container">
        <p class="content">Let's examine the major categories, ranked from best to worst for nutritional impact.</p>

        <h2 class="subtitle">Fruits & Vegetables: Eat As Much As You Can!</h2>
        <p class="content">According to <a href="https://www.cdc.gov/media/releases/2017/p1116-fruit-vegetable-consumption.html">the Centers for Disease Control and Prevention, only 10% of American adults eat enough Fruits or Vegetables.</a> According to the CDC, "eating a diet rich in fruits and vegetables daily can help reduce the risk of many leading causes of illness and death, including heart disease, type 2 diabetes, some cancers, and obesity." Are you eating 2 cups of fruits per day and three cups of vegetables per day? With the ease of packaged and processed foods it can be easy to overlook these recommendations, but following the guidelines contains <a href="/health-benefits-long-term">numerous advantages.</a></p>

        <h2 class="subtitle">Don't Skimp On Beans & Whole Grains</h2>

        <p class="content">Whole grains like oats, brown rice, quinoa, bread, popcorn, and pasta are an integral part of any vegan diet. They provide complex carbohydrates and fiber to keep you full for an extended period of time.</p>

        <p class="content">Beans are a vegans best friend. The offer rich sources of proteins and fiber and are some of the healthiest and most versatile foods out there. Hummus, tofu, and tempeh are all bean-based favorites! Some of the best beans nutritionally are chickpeas, black beans, lentils, edamame, kidney beans, split beans, and cannellini beans.</p>

        <p class="content">At a loss for how to get started with eating more healthy foods? Check out <a href="/vegan-recipes">our recipes on Vegaroo, which all feature prominent servings of beans, grains, and vegetables and can be prepared in 30 minutes or less!</a></p>

        <h2 class="subtitle">Processed Plant Foods: Eat Sparingly</h2>

        <p class="content">Eating Vegan doesn't necessarily mean eating healthy. After all, a diet of Oreos, french fries and beer is vegan! That's why at Vegaroo we try to emphasize the importance of eating a wide variety of whole-plant based foods. Yet processed plant-foods are especially helpful in making the switch from an omnivorous diet. </p>

        <p class="content">Some of the processed plant foods that might be helpful for intiating a transition to the vegan diet are plant-based dairy alternatives like almond milk and soy yogurt, pre-packaged vegan burgers, or vegan cheese alternatives.</p>

        <h2 class="subtitle">Poultry & Fish: Harmful, But Better Than Eating Carcinogens</h2>

        <p class="content">For many people looking to make positive changes to their diet, switching from beef to poultry or fish is a good first step. However, even these "healthy alternatives" have been linked to troubling health outcomes like increased cholesterol, the leading indicator of heart disease.
            <a href="https://www.forksoverknives.com/beef-chicken-fish-will-not-lower-cholesterol/#gs.1HghgPw"> In fact, switching from red meat to chicken and fish doesn't necessarily decrease cholesterol or saturated fat.</a></p>

        <p class="content">Don't trust me? How about a doctor?</p>
        <div class="videoWrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/RjNcvDxCvFk" frameborder="0" allowfullscreen></iframe>
        </div>

        <p class="content">Additionally, poultry is the easiest way to expose yourself to <a href="https://www.wired.com/story/antibiotic-brined-chicken-and-other-bad-ideas-from-us-farming/">antibiotic-resistant bacteria</a>, fecal contamination, and unnatural hormones that are used by the dairy industries to make birds fatter, faster.</p>

        <p class="content">Whether farmed or caught in the wild, fish are also exposed to numerous toxins before they reach your mouth. Whether it's in run-off from industrial plants that reaches the water supply or supplemented by farmers growing fish in confined quarters, most fish available in grocery stores today are not the same as their natural ancestors.
            <a href="https://news.nationalgeographic.com/2016/02/160203-feminized-fish-endocrine-disruption-hormones-wildlife-refuges/">Some males are even growing eggs in their testicles, a direct result of polluted hormones.</a> By consuming an animal that has ingested such pollutants, we are exposing ourselves to harm as well.</p>
        
        <p class="content">Worried about your protein intake? The <a href="https://www.accessdata.fda.gov/scripts/InteractiveNutritionFactsLabel/protein.html">US Food & Drug Administration recommends a daily intake of only 50 grams of protein,</a> whereas the average American eats about 75 grams per day. There are plenty of plant-based foods that provide excellent sources of protein, and you can always find vegan protein powders.</p>

        <h2 class="subtitle">Red Meat: Bad For You and Worse For The Environment</h2>

        <p class="content">Beef holds the unique position of being doubly harmful, which enables us to align a healthy population with a healthy planet. It is not only proven to be a leading cause of major chronic diseases like Obesity and Diabetes, but it is also by far the worst food for our planet. First of all,
            <a href="/environmental-benefits">beef production requires the largest amount of natural resources like water, grain, and land, and is the leading cause of destruction in the Amazon rainforest.</a> Additionally, cows are natural producers of Nitrogen Oxide, a greenhouse gas 20 times more harmful than Carbon Dioxide.</p>

        <p class="content">If you're interested in learning more about the impact of beef on the environment and your waistline, check out the following video:</p>

        <div class="videoWrapper">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ut3URdEzlKQ" frameborder="0" allowfullscreen></iframe>
        </div>

        <h2 class="subtitle">Processed Meats: They Literally Cause Cancer</h2>

        <p class="content">The <a href="https://www.cancer.org/cancer/cancer-causes/general-info/known-and-probable-human-carcinogens.html">World Health Organization</a> classifies processed meats like ham, hot dogs, and bacon as Group 1 Carcinogens, which means they are harmful to humans. This places processed meats in the same category as other harmful substances like cigarettes and plutonium. If you're trying to follow a healthy diet, it's best to avoid this form of meat.</p>

        <h2 class="subtitle">Tl;DR</h2>

        <p class="content">Nutrition is still an evolving science, and the interests of heavily entrenched big food companies want the evolution of science to go as slowly as possible. Yet the research consistently proves that eating meat and dairy products causes more harm than good. Instead, center your diet around vegetables, fruits, beans, and whole grains for the healthiest long-term outcomes.</p>
    </div>
</div>

<div class="footer_wrapper">
    <div class="footer_container">
        @include('partials.why')
        <br>
        @include('partials.all-recipes-button')
    </div>
</div>

@endsection