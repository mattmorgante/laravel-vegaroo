@extends('layouts.app')

<title>Vegaroo Daily Dashboard</title>
<meta name="description" content="Track the daily dozen and save your progress over time using Vegaroo"/>

@include('partials.nav')
@section('content')

    <div class="container">
    <div class="user-nav">
        <a class="active-nav-item" href="#">Daily</a>
        <a href="/weekly">Weekly</a>
        <a href="/profile">Profile</a>
    </div>

    <h2>How does this work?</h2>

    <p>The <a href="/vegan-foods">Daily Dozen</a> is a collection of daily recommendations to prevent the 14 biggest causes of death and improve your health. Get started by filling in what you've eaten today!<p>

      <div class="header-inline">
        <h2 style="text-align: center; color: #26ce81;">{{ $displayDate }}</h2>

        <div class="datepicker-wrapper">
          <i onclick="changeDateByOne(-1)" class="fas fa-chevron-left"></i>
          <input placeholder="Pick a different date" type="text" id="datepicker" onchange="retrieveDate()">
          <button id="go-button">Go</button>
          <i onclick="changeDateByOne(1)" class="fas fa-chevron-right"></i>
        </div>

      </div>
    </div>

      @include('partials.daily-dozen')
    <div class="container">
      <br>
      <h2 class="other-recipes">What else should you eat today? <a href="javascript:window.location.reload(true);">(Update)</a></h2>


      @foreach ($recommendedRecipes as $name => $recipeCollection)
        @if (count($recipeCollection) != 0 )
          <h2>Recipes with {{ $name }}</h2>
          @foreach ($recipeCollection as $recipe)
              @if ($loop->iteration % 4 == 1 )
                  <div class="flexible_row">
                      @endif

                      @include('partials.recipe-box')
                      @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
                  </div>
              @endif
          @endforeach
        @endif
      @endforeach

        <div class="btn-wrapper">
          <button class="login-button" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
              Logout
          </button>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>

        </div>
        <br>
    </div>

    <script src="{{asset('js/pikaday.js')}}"></script>
    <script>
        var picker = new Pikaday({
          field: document.getElementById('datepicker'),
          maxDate: new Date(),
          minDate: new Date('January 1, 2018 00:00:00')
        });
        picker.gotoToday();

        function retrieveDate() {
            var date = picker.getDate();
            console.log(date);
        }

        document.getElementById("go-button").addEventListener("click", function(event){
            event.preventDefault();
            var date = picker.getDate();
            console.log(date);
            var newdate = formatDate(date);
            console.log('/home/' + newdate);
            window.location.href=('/home/' + newdate);
        });

        function formatDate(date) {
            var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        function changeDateByOne(incrementor){
          var urlParts = window.location.href.split('/');
          var lastPart = urlParts.pop();
          var date = new Date(lastPart);
          date.setDate(date.getDate() + incrementor);
          var newdate = formatDate(date);
          console.log('/home/' + newdate);
          window.location.href=('/home/' + newdate);
        }

        const nav = document.querySelector('#myProgress');
        const topOfNav = nav.offsetTop;
        function fixNav() {
            console.log(topOfNav);
            if(window.scrollY >= topOfNav) {
                document.body.style.paddingTop = nav.offsetHeight + 'px';
                document.body.classList.add('fixed-nav');
            } else {
                document.body.style.paddingTop = 0;
                document.body.classList.remove('fixed-nav');
            }
        }

        window.addEventListener('scroll', fixNav)

    </script>

@endsection


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css"/>
