<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      @include('partials.navigation')
    </header>
      <h1>
        @yield('title')
      </h1>
      @yield('content')
  </body>
</html>
