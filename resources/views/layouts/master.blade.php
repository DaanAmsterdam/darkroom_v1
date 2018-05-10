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
    <div class="container flex flex-col h-screen justify-between">
        <div class="py-4 bg-grey mb-2">
    @include('layouts.header')
        </div>

        <div class="py-4 bg-grey mb-2">
            @yield('content')
        </div>

        <div class="py-4 bg-grey">
    @include('layouts.footer')
        </div>
    </div>
</body>

</html>