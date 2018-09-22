<div class="green_footer">
    <div class="footer_category" id="recipes_footer">
        <h4>Recipes</h4>
        <ul>
            <li><a href="/vegan-recipes">All Recipes</a></li>
            <li><a href="/vegan-recipes/popular">Most Popular Recipes</a></li>
            <li><a href="/vegan-recipes/bowls">Grain Bowls</a></li>
            <li><a href="/vegan-recipes/curries">Curries</a></li>
            <li><a href="/vegan-recipes/stir-fries">Stir-Fries</a></li>
            <li><a href="/vegan-recipes/salads">Salads</a></li>
            <li><a href="/vegan-recipes/breakfasts">Breakfasts</a></li>
            <li><a href="/vegan-recipes/snacks">Snacks</a></li>
            <li><a href="/vegan-recipes/smoothies">Smoothies</a></li>
        </ul>
    </div>
    <div class="footer_category" id="resources_footer">
        <h4>Resources</h4>
        <p>Why should I eat fewer animal products?</p>
        <ul>
            <li><a href="/health-benefits-long-term">For your health</a></li>
            <li><a href="/environmental-benefits">For the planet</a></li>
            <li><a href="/stop-animal-cruelty">For the animals</a></li>
        </ul>
        <p>How can I eat fewer animal products?</p>
        <ul>
            <li><a href="/small-steps">7 Small Steps To Get Started</a></li>
            <li><a href="/nutrition">What foods should I eat?</a></li>
            <li><a href="/blogs-books-documentaries">Blogs, Books, and Documentaries</a></li>
        </ul>
    </div>
    <div class="footer_category" id="tools_footer">
        <h4>Tools</h4>
        <ul>
            <li><a href="/dashboard">Track the Daily Dozen</a></li>
            <li><a href="/calculator">Environmental Impact Calculator</a></li>
        </ul>
        @if ( Auth::guest() )
            <h4>Get Started</h4>
            <ul>
                <li><a href="/register">Join Vegaroo</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        @else
            <h4>My Vegaroo</h4>
            <ul>
                <li><a href="/home">Daily Dashboard</a></li>
                <li><a href="/weekly">Weekly Report</a></li>
                <li><a href="/profile">Profile</a></li>
            </ul>

        @endif
    </div>
    <div class="footer_category" id="about_footer">
        <h4>About</h4>
        <ul>
            <li><a href="/values">Why Vegaroo?</a></li>
            <li><a href="https://www.facebook.com/vegaroo.co">Connect With Us On Facebook</a></li>
            <li style="padding-bottom: 5px;"><a href="mailto:matthewmorgante@gmail.com?Subject=Vegaroo">Contact Me</a></li>
            <li><a href="https://www.mattmorgante.com">Made by &#x2615 & &#x1F34E & &#x1F955 & Matt</a></li>
        </ul>
    </div>
</div>