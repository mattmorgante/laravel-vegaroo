<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vegaroo</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/public/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/img/favicon-16x16.png">
    <link rel="manifest" href="/public/img/manifest.json">
    <link rel="mask-icon" href="/public/img/safari-pinned-tab.svg" color="#10cf7d">
    <link rel="shortcut icon" href="/public/img/favicon.ico">
    <meta name="msapplication-config" content="/public/img/browserconfig.xml">
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