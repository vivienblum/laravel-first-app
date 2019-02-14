<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'First App')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  </head>
  <body style="padding: 40px; background-color: #f5f5f5; min-height: 100vh;">

    <div class="container">
        @if (session('message-content'))
            <div class="notification is-{{ session('message-type') ? session('message-type') : 'default' }}">
                {{ session('message-content') }}
            </div>
        @endif

        @yield('content')
    </div>

  </body>
</html>
