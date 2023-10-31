<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/fontawesome-free-6.4.2-web/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/fontawesome-free-6.4.2-web/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/fontawesome-free-6.4.2-web/css/solid.css')}}">
    <script type="text/javascript" src="{{asset('assets/clients/js/all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
</head>
<body>
    @include('clients.blocks.header')
    <main class="container-lg m-auto mt-5">
        @yield('content')
    </main>
    @include('clients.blocks.footer')
</body>
    <script type="text/javascript" src="{{asset('assets/clients/js/all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('javascript')
</html>