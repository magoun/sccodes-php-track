<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <div>
            <!--<h1>{{ $title }}</h1>-->
            <!--<br />-->
            
            @foreach ($orgs as $org)
                <li>{{ $org->title }}</li>
            @endforeach
        </div>
    </body>
</html>
