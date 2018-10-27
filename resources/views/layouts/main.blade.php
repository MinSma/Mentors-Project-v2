<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.0/spacelab/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>Mentors Project - @yield('title')</title>

</head>
<body>
<nav class="navbar navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('guestPages.home') }}" title="Pagrindinis puslapis">
            <img style="max-width:125px; margin-top: -10px;" src="{{ asset('images/Logo_orange.png') }}">
        </a>
    </div>
    <ul class="nav navbar-nav">
        @yield('menu')
    </ul>
</nav>
<div class="container-fluid">
    @include('layouts.sessionsFlash')
    @yield('content')
</div>
</body>
</html>