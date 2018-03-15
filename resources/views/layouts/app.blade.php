<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{!! request()->fullUrl() !!}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="robots" content="index,follow">
    <meta property="og:url" content="http://vegaroo.co/" />
    <meta property="og:site_name" content="Vegaroo" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Easy, Cheap & Delicious Plant-based Meals For Vegans" />
    <meta name="twitter:title" content="Vegaroo | Easy, Cheap & Delicious Plant-based Meals For Vegans" />
    <meta name="twitter:site" content="@havesomegante"/>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/manifest=====.json">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#10cf7d">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="msapplication-config" content="/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/critical.css')}}"/>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

@section('header.javascript')
    @show
</head>
<body>


    @yield('content')
    @include('partials.footer')

    @if (env('APP_ENV') == 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56273136-4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-56273136-4');
        </script>
    @endif
    {{--<script>--}}
        {{--window.intercomSettings = {--}}
            {{--app_id: "j0uowuxl"--}}
        {{--};--}}
    {{--</script>--}}
    {{--<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/j0uowuxl';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>--}}
</body>
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
</html>
