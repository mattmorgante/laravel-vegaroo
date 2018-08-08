@extends('layouts.app')

@section('content')

@include('partials.nav')
<div class="call_to_action">
    <div class="email_capture">
        <p>Enter your e-mail to see your suggestions</p>

        <div class="input_button">
            <form onsubmit="return doSomething2();">
                  <span class="enter_email">
                      <input class="email-submit" type="text" placeholder="Enter Your Email Address" name="email">
                  </span>
                <input type="submit" class="button">
            </form>
        </div>
    </div>
</div>

@endsection

<script>

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function doSomething2() {
        var urlParts = window.location.href.split('/');
        var hashed_id = urlParts[5];
        console.log(hashed_id);

        var data = $('form').serializeArray();
        var isValidEmail = (validateEmail(data[0].value));

        if (isValidEmail === true) {
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
                    window.location.href=('/display-suggestions/' + hashed_id);
                }
            });
        } else {
            alert('Please enter a valid email');
        }
        return false;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>