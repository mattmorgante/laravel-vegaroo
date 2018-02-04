<nav class="nav">
    <div class="nav-left">
        <ul>
            <a href="/"><img src="/img/logo.png" alt="Vegaroo" class="image_icon"></a>
        </ul>
    </div>
    <div class="nav-right">
        <ul>
            <li><a href="/resources">Resources</a></li>
            <li><a href="/vegan-recipes">Recipes</a></li>
            <li><a href="/values">Values</a></li>
            @if (Auth::check())
                <li><a href="{{ url('/logout') }}">Logout</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
            @endif

        </ul>
    </div>
</nav>
