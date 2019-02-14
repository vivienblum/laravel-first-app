<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'First App')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  </head>
  <body style="padding: 40px; background-color: lightgrey; min-height: 100vh;">

    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
