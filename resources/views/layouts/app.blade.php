<!DOCTYPE html class="h-100">
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', config('app.name')) - 哔，哔哔</title>
  <meta name="description" content="@yield('description', '哔哔社区，没事多哔哔！')">

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  @yield('styles')

</head>
<body class="d-flex flex-column h-100">
  <div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')

    @yield('pre-content')

    <div class="container mb-3">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>

  @yield('scripts')

</body>
</html>
