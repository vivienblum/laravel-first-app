<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'First App')</title>
  </head>
  <body>

    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/about">About</a></li>
    </ul>

    @yield('content')
  </body>
</html>
