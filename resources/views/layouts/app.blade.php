<!DOCTYPE html class="h-100">
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', config('app.name')) - 哔，哔哔</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
  <div id="app" class="{{ route_class() }}-page d-flex flex-column h-100">
    @include('layouts._header')

    @yield('pre-content')

    <div class="container">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
