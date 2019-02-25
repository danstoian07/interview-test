<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Evonomix Test') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

@include('partials.menu')


<!-- Page Content -->
<div class="container" id="app">

    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @yield('content')

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Evonomix Test 2019</p>
    </div>
    <!-- /.container -->
</footer>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
