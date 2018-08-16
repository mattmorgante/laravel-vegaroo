  <div id="myProgress">
      <div id="myBar" style="width: {{ $today->percentage }}%;">{{ $today->percentage }}%</div>
  </div>
<div class="container">
  <div class="card-wrapper">
  @foreach ($foods as $food)
    @if ($today->{"$food->slug"} >= $food->recommended)
      <div class="food-card" style="background-color: #26ce81">
    @elseif ( ($today->{"$food->slug"} / $food->recommended) >= .50 )
      <div class="food-card" style="background-color: #92e6c0">
    @elseif  ( ($today->{"$food->slug"} / $food->recommended) >= .33 )
      <div class="food-card" style="background-color: #ffff7e">
    @else
      <div class="food-card" style="background-color: #ef5757">
    @endif
          <p id="food-name">{{ $food->name }}</p>
          <p>{{ $food->servingSize }}</p>
          <br>
          <i class="fas fa-minus-circle fa-2x" onclick='increment(-1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}")'></i>
          <input class="table-data" disabled size=3 id='{{$food->slug }}-{{$today->id}}' value='{{ $today->{"$food->slug"} }}'> <span class="table-recommended"> / {{ $food->recommended }} </span>
          <i class="fas fa-plus-circle fa-2x" onclick='increment(1, "{{ $food->slug }}-{{ $today->id }}", "{{ $food->recommended }}" )'></i>
          <br><br><a style="text-decoration: none" href="/vegan-foods/{{ $food->slug }}">Read More</a>
      </div>
  @endforeach
  </div>
</div>


  <script type="text/javascript">

      function increment(incrementor, target, recommended) {
          console.log(target);
          var value = parseInt(document.getElementById(target).value);

          if (value == 0 && incrementor == -1) {

          } else {
            value+=incrementor;

            if (value == 0) {
              document.getElementById(target).parentElement.style.backgroundColor = "#ef5757";
            }

            if ( (value / recommended) >= .33 ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#ffff7e";
            }

            if ( (value / recommended) > .50 ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#92e6c0";
            }

            if ( value >= recommended ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#26ce81";
            }

            if (value > recommended ) {

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

  </script>
