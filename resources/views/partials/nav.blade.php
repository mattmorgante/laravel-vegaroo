<nav class="nav">
    <div class="nav-left">
        <ul>
            <a href="/"><img src="/img/logo.png" alt="Vegaroo Logo" class="image_icon" title="Vegaroo"></a>
        </ul>
    </div>

    <div class="topnav" id="navId">
        <a href="javascript:void(0);" class="icon" onclick="toggleNav()">Menu &nbsp;
            <i class="fa fa-bars"></i>
        </a>
        <a href="/vegan-recipes">Recipes</a>
        <a href="/resources">Resources</a>
        <a href="/calculator">Env. Calc.</a>
        <a href="/values">About</a>
        @if ( Auth::guest() )
            <a class="join-burger" href="{{ route('register') }}">Join Vegaroo</a>
        @else
            <a class="join-burger" href="/home">Dashboard</a>

        @endif
    </div>
</nav>

<script>
    function toggleNav() {
        var x = document.getElementById("navId");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function closeNav() {
        var x = document.getElementById("navId");
        if (x.className === "topnav") {
        } else {
            x.className = "topnav";
        }
    }

    var specifiedElement = document.getElementById('navId');

    document.addEventListener('click', function(event) {
        var isClickInside = specifiedElement.contains(event.target);

        if (!isClickInside) {
            closeNav();
        }
    });

</script>