<nav class="nav">
    <div class="nav-left">
        <ul>
            <a href="/"><img src="/img/logo.png" alt="Vegaroo" class="image_icon"></a>
        </ul>
    </div>

    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">Menu &nbsp;
            <i class="fa fa-bars"></i>
        </a>
        <a href="/resources">Resources</a>
        <a href="/vegan-recipes">Recipes</a>
        @if ( Auth::guest() )
            <a href="{{ route('login') }}">Login</a>
        @else
            <a href="/home">Dashboard</a>
        @endif
    </div>
</nav>


<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>