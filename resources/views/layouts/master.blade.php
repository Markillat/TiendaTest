<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title> Tienda </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Jose Quilca" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
{{--    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">--}}

{{-- @section('body') --}}

<body class="pace-done">
{{-- @show --}}
<!-- Begin page -->
<div id="layout-wrapper">
{{--@include('layouts.topbar')--}}
{{--@include('layouts.sidebar')--}}
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">

            <div id="app">
                @yield('contentForm')
            </div>

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
</div>

{{--<script src="{{asset('js/appVue.min.js')}}"></script>--}}
<script src="{{asset('js/app.js')}}"></script>


</body>
</html>
