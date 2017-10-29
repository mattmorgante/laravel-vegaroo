@extends('layouts.app')

@include('partials.nav')


<div class="container">
    <h2>Resources</h2>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a href="/calculator">Calculate The Environmental Impact Of Your Diet</a></h3>
        </div>
    </div>


    <h3>Why Eat Plant-Based?</h3>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a class="article_link" href="/environmental-benefits">Join the #resistance against Climate Change</a></h3>
        </div>
    </div>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a class="article_link" href="/health-benefits-short-term">Lose Weight and Gain More Energy</a></h3>
        </div>
    </div>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a class="article_link" href="/health-benefits-long-term">Prevent Heart Disease, Cancer & more</a></h3>
        </div>
    </div>

    <h3>How To Eat Plant-Based?</h3>

    <div class="flexible_row">
        <div class="row_item">
            <h3><a class="article_link" href="/vegan-on-a-budget">How To Eat Vegan On A Budget</a></h3>
        </div>
    </div>
    <div class="flexible_row">
        <div class="row_item">
            <h3><a class="article_link" href="/pantry">The Pantry Checklist</a></h3>
        </div>
    </div>
    <div id="footer"><!-- flex container -->
        <button class="join_slack"><!-- flex item -->
            <h3><a class="article_link" href="https://www.slack.vegaroo.com">Join Our Community</a></h3>
        </button>
    </div>
</div>

