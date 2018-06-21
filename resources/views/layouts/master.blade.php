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
</head>

<body>
    <div class="mx-auto flex flex-col h-screen">
    @include('layouts.header')


        <div class="flex h-full">
    @include('layouts.sidebar') @yield('content')


        </div>
    </div>
</body>

</html>