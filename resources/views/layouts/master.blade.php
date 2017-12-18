<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('src/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/mystylesheet.css') }}"/>

    <link href="{{ URL::asset('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

<!--
    <link href="{{ URL::asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.theme.css')}}" rel="stylesheet">
-->

    @yield('styles')
</head>
<body>
@yield('header')


<div class='container'>
    @yield('scripts1')



    @yield('content')
</div>


<script src="{!! asset('js/jquery-1.11.0.min.js') !!}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.cookie.js')}}"></script>
<script src="{{ URL::asset('js/waypoints.min.js')}}"></script>
<script src="{{ URL::asset('js/modernizr.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{ URL::asset('js/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('js/front.js')}}"></script>

@yield('scripts')
</body>
</html>