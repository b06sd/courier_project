<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description"/>
    <meta content="webthemez" name="author"/>
    <title>{{ config('app.name', 'A Courier') }}</title>
    <link href="{{ asset('access/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('access/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('access/site.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="{{ asset('access/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('access/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('access/site.js') }}"></script>

</head>

<!------ Include the above in your HEAD tag ---------->
    @yield('content')
</html>
</html>
