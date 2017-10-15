<html>
<head>
    <title>Vegaroo</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
</head>
<body>
@section('nav')
    {{--Nav - find me in app.blade.php--}}
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>