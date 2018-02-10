@extends('layouts.app')

@include('partials.nav')
@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = google.visualization.arrayToDataTable([
                ['Food', '% Consumed'],
                ['Beans', {{ $week['beans'] }}],
                ['Greens', {{ $week['greens'] }}],
                ['Cruciferous', {{ $week['cruciferous'] }}],
                ['Berries', {{ $week['berries'] }}],
                ['Fruits', {{ $week['fruits'] }}],
                ['Vegetables', {{ $week['vegetables'] }}],
                ['Grains', {{ $week['grains'] }}],
                ['Flaxseeds', {{ $week['flaxseeds'] }}],
                ['Nuts', {{ $week['nuts'] }}],
                ['Spices', {{ $week['spices'] }}],
                ['Beverages', {{ $week['water'] }}],
                ['Exercise', {{ $week['exercise'] }}]
            ]);

            var options = {
                title: 'Percentage Of Each Food\u0027s Recommended Servings Consumed In The Last 7 Days',
                legend: { position: "none" },

                hAxis: {
                    minValue: 0,
                    maxValue: 100
                },
                vAxis: {
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', '% of Total'],
                ['{{ $days[6] }}',  {{ $percentage[6] }}],
                ['{{ $days[5] }}',  {{ $percentage[5] }}],
                ['{{ $days[4] }}',  {{ $percentage[4] }}],
                ['{{ $days[3] }}',  {{ $percentage[3] }}],
                ['{{ $days[2] }}',  {{ $percentage[2] }}],
                ['{{ $days[1] }}',  {{ $percentage[1] }}],
                ['{{ $days[0] }}',  {{ $percentage[0] }}]
            ]);

            var options = {
                title: 'Percentage of Total Recommended Servings Consumed In The Last 7 Days',
                legend: { position: "none" },
                vAxis: {minValue: 0, maxValue:100}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
            chart.draw(data, options);
        }
    </script>

    <div class="container">
      <div class="header-inline">
        <h2 style="text-align: center; color: #26ce81;">Your Daily Progress for {{ $displayDate }}</h2>

        <div class="datepicker-wrapper">
          <i onclick="changeDateByOne(-1)" class="fas fa-chevron-left"></i>
          <input placeholder="Pick a different date" type="text" id="datepicker" onchange="retrieveDate()">
          <button id="go-button">Go</button>
          <i onclick="changeDateByOne(1)" class="fas fa-chevron-right"></i>
        </div>

      </div>

        <div id="myProgress">
            <div id="myBar" style="width: {{ $today->percentage }}%;">{{ $today->percentage }}%</div>
        </div>

        <div class="card-wrapper">
        @foreach ($foods as $food)
          @if ($today->{"$food->slug"} == $food->recommended)
            <div class="food-card" style="background-color: #26ce81">
          @elseif ( ($today->{"$food->slug"} / $food->recommended) >= .50 )
            <div class="food-card" style="background-color: #92e6c0">
          @elseif  ( ($today->{"$food->slug"} / $food->recommended) >= .33 )
            <div class="food-card" style="background-color: #d3f5e5">
          @else
            <div class="food-card" style="background-color: white">
          @endif
                <a href="/vegan-foods/{{ $food->slug }}">{{ $food->name }}</a>
                <p>{{ $food->servingSize }}</p>
                <br>
                <i class="fas fa-minus-circle fa-2x" onclick='increment(-1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}")'></i>
                <input class="table-data" disabled size=3 id='{{$food->slug }}-{{$today->id}}' value='{{ $today->{"$food->slug"} }}'> <span class="table-recommended"> / {{ $food->recommended }} </span>
                <i class="fas fa-plus-circle fa-2x" onclick='increment(1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}" )'></i>
            </div>
        @endforeach
        </div>

        <h2>Last 7 Days Report</h2>
        <div id="chart_div2" style="width: 100%; height: 500px"></div>
        <div id="chart_div" style="width: 100%; height: 500px;"></div>

        <div class="btn-wrapper">
          <a class="btn" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
              Logout
          </a>

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

    </script>

@endsection

<script>

    function increment(incrementor, target, recommended) {
        console.log(target);
        var value = parseInt(document.getElementById(target).value);
        value+=incrementor;

        if (value == 0) {
          document.getElementById(target).parentElement.style.backgroundColor = "white";
        }

        if ( (value / recommended) >= .33 ) {
            document.getElementById(target).parentElement.style.backgroundColor = "#d3f5e5";
        }

        if ( (value / recommended) >= .50 ) {
            document.getElementById(target).parentElement.style.backgroundColor = "#92e6c0";
        }

        if ( value == recommended ) {
            document.getElementById(target).parentElement.style.backgroundColor = "#26ce81";
        }

        if (value > recommended) {

        } else {
            document.getElementById(target).value = value;
            updateBar(incrementor);

            var data = target.split("-");

            $.ajax({
                url: "/save",
                cache: false,
                data: {
                    food: data[0],
                    dayId: data[1],
                    value: value
                }
            })
                    .done(function (response) {
                        console.log(response);
                        console.log('yes');
                    })
                    .fail(function () {
                        console.log("error");
                    });
        }
    }

    function updateBar(incrementor) {
        var bar = document.getElementById("myBar");
        var width = bar.style.width;
        width = width.slice(0, -1);
        width = parseInt(width);
        var newWidth = "0";
        if (incrementor == -1) {
            newWidth = (width - 4) +'%';
        } else {
            newWidth = (width + 4) +'%';
        }
        bar.style.width = newWidth;
        bar.firstChild.nodeValue = newWidth;
    }


// window.onLoad = function sticky() {
//   var nav = document.getElementById('myProgress');
//   const navTop = nav.offsetTop;
// }
//
// function stickyNavigation() {
//   var nav = document.getElementById('myProgress');
//   const navTop = nav.offsetTop;
//
//   console.log('navTop = ' + navTop);
//   console.log('scrollY = ' + window.scrollY);
//
//   if (window.scrollY >= navTop) {
//     // nav offsetHeight = height of nav
//     document.body.style.paddingTop = nav.offsetHeight + 'px';
//     document.body.classList.add('fixed-nav');
//   } else {
//     document.body.style.paddingTop = 0;
//     document.body.classList.remove('fixed-nav');
//   }
// }

window.addEventListener('scroll', stickyNavigation);

</script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css"/>
