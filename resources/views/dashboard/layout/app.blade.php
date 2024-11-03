<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Gogle Media admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Gogle Media admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="moniem">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Gogle Media - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('_dashboard/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('_dashboard/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @include('dashboard.layout._partials.styles')
    @stack('styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('dashboard.layout._partials.navbar')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('dashboard.layout._partials.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @yield('breadcrumb')
        <div class="content-body">
            <div class="row">
                @yield('alert')
            </div>
            <!-- Dashboard Content Starts -->
            @yield('content')
            <!-- Dashboard Content ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

{!! Html::form('DELETE', '')->id('delete-form')->open() !!}
{!! Html::form()->close() !!}
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('dashboard.layout._partials.footer')
<!-- END: Footer-->


@include('dashboard.layout._partials.script')
@stack('scripts')
</body>
<!-- END: Body-->

</html>
