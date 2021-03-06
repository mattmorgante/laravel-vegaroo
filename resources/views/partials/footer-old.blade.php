<div class="call_to_action">
    @if ( Auth::guest() )
        <div class="email_capture"><p>Interested in living a healthier and more eco-conscious life?</p>
            <a href="/register">
                <button class="login-button">
                    Join Vegaroo
                </button>
            </a>
        </div>
    @else
        <div class="email_capture">
            <p>Stay tuned for updates from Vegaroo</p>

            <div class="input_button">
                <form onsubmit="return doSomething();">
              <span class="enter_email">
                  <input class="email-submit" type="text" placeholder="Enter Your Email Address" name="email">
              </span>
                    <input type="submit" class="button">
                </form>
            </div>
        </div>

        <script>

            function doSomething() {
                var data = $('form').serialize();
                console.log(data);
                $.ajax({
                    url: '/addEmail',
                    type: 'POST',
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
                        console.log(response);
                        alert('Thanks! We will be in touch soon!');
                        $('.input_button').fadeOut();
                    }
                });


                return false;
            }
        </script>

    @endif
</div>
<div class="footer">
    <p style="margin: 10px;">Made with &#x2615 & &#x1F34E & &#x1F955 in Amsterdam by <a href="https://www.mattmorgante.com">Matt</a>.
</div>

