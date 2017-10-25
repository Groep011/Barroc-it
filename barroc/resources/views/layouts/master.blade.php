<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barroc-IT</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @yield('nav-links')
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/logout">logout</a></li>
                    </p>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="header-top center navbar-fixed-bottom">
        <div class="container-wide center">
            <p>&copy; 2017 Groep-11<p>
            {{--logged in as {{ $user }}--}}
        </div>
    </div>
</div>
</body>
</html>
