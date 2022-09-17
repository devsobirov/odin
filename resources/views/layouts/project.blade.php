<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ODIN | Кабинет </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Theme styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.min.css') }}">

    <!-- Add your scripts here -->
</head>


<body>
    @include('layouts._header-project')
    @include('layouts._messages')
@yield('content')

<!-- JAVASCRIPT
============================================-->

<!-- Vendor -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>


<!-- Main Theme file -->
<script src="{{ asset('assets/js/theme.min.js') }}"></script>

</body>
</html>
