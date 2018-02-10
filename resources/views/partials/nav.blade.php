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
            @if ( Auth::guest() )
                <li class="login-nav"><a href="{{ route('register') }}">Join</a></li>
            @else
                <li><a href="/home">User Home</a></li>
            @endif

        </ul>
    </div>
</nav>
