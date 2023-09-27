<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/all.min.css')}}">
</head>
<body>
    @include('clients.blocks.header')
    <main class="row">
        <aside class="col-2">
            @include('clients.blocks.sidebar')
        </aside>
        <section class="container col-10 row">
            @yield('content')
        </section>
    </main>
    <footer>

    </footer>
    <script type="text/javascript" src="{{asset('assets/clients/js/all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('javascript')
</body>
</html>