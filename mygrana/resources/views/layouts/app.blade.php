<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo  ')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <!-- Navbar -->
      <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
          <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>MyGrana</a>
          @if (Route::has('register'))
            <a class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" href="{{ route('register') }}"><strong>Cadastrar</strong></a>
          @endif
        </div>





      </div>

      <!-- Navbar on small screens -->
      <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
          <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>MyGrana</a>
      </div>
      <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">

          <!-- Middle Column -->
          @yield('content')

          <!-- End Grid -->
        </div>

        <!-- End Page Container -->
      </div>
      <br>

    </div>
</body>
</html>
