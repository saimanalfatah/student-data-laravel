<!doctype html>
<html lang="en">
  <head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Siswaku</title>
  </head>
  <body>
    @include('navbar')
    <div class="container">
        @yield('main')
    </div>
    @include('footer')

    {{-- Optional JavaScript --}}
    {{-- jQuery first, then Popper.js, then Bootstrap JS --}}
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('bootstrap-4.5.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
  </body>
</html>