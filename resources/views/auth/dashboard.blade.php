<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('logout') }}">
    {{ csrf_field() }}

    <a href="route('logout')"
          onclick="event.preventDefault();
          this.closest('form').submit();">
        {{ __('Log Out') }}
</form>
</body>
