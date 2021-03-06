<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            font-family: 'Baloo Tammudu 2', cursive;
        }
    </style>
</head>

<body>
    <div id="app">
        <main-app></main-app>
    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>