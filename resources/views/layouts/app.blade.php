<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vegaroo</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/manifest.json">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#10cf7d">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="msapplication-config" content="/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
    @section('header.javascript')
    @show
</head>
<body>
    @yield('content')
    @include('partials.footer')
</body>
</html>