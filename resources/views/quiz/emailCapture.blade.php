@extends('layouts.app')

@section('content')

@include('partials.nav')
<div class="call_to_action">
    <div class="email_capture">
        <p>Stay tuned for updates from Vegaroo</p>

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

    function doSomething2() {
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>