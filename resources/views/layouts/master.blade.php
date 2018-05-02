<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/normalize.css" rel="stylesheet">
</head>

<body>
    @include('layouts.header') @yield('content')
    @include('layouts.aside')
    @include('layouts.footer')
</body>

</html>