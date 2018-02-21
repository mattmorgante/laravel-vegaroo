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
                <li class="spacer"></li>
                <li class="login-nav"><a href="{{ route('login') }}">LogIn</a></li>
            @else
                <li><a href="/home">Dashboard</a></li>
            @endif

        </ul>
    </div>
</nav>
