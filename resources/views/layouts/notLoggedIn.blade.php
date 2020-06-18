<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    @yield('links-in-head')
</head>
<body>


    @yield('content')

    {{-- my js --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
