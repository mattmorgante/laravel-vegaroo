<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vegaroo</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
    @section('header.javascript')
    @show
</head>
<body>
    @yield('content')
    @include('partials.footer')
</body>
</html>