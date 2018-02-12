
        <!-- <div class="input_button"> -->
            <!-- <form onsubmit="return doSomething();">
                <span class="enter_email">
                    <input class="email-submit" type="text" placeholder="Enter Your Email Address" name="email">
                </span>
                <input type="submit" class="button">
            </form> -->
        <!-- </div> -->

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
