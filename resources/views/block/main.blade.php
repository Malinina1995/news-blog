<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('inc.header')
        <div class="content container">
            <div class="mt-5">
                @include('inc.message')
            </div>
            @yield('content')
        </div>
        @include('inc.footer')
    </body>
</html>
