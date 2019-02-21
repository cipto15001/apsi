<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APSI</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('vendors/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('vendors/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('vendors/node-waves/waves.css') }}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{ asset('vendors/animate-css/animate.css') }}" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="{{ asset('vendors/morrisjs/morris.css') }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('styles/themes/all-themes.css') }}" rel="stylesheet"/>

    @stack('styles')
</head>

<body class="theme-amber">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>
            @php
                $texts = [
                    'Will Be Landing Soon',
                    'Harvesting Eggs',
                    'Summoning Phantoms',
                    'Howling at the Moon',
                    'Purging Heretics',
                    'Almost There'
                ];
            @endphp
            {{ array_random($texts) }}
        </p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('workspaces.index') }}">APSI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                <!-- #END# Call Search -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right">
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active">
                <ul class="demo-choose-skin">
                    <li data-theme="pink">
                        <form method="POST" action="{{ route('logout') }}">
                            <!-- <div class="pink"></div> -->
                            {{ csrf_field() }}
                            <input class="btn btn-primary btn-sm" type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    @yield('main-content')
</section>
<!-- #END# Page Loader -->
@yield('non-main-content')

<!-- Jquery Core Js -->
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('vendors/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('vendors/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('vendors/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('scripts/admin.js') }}"></script>
{{--<script src="{{ asset('scripts/pages/index.js') }}"></script>--}}

<!-- Demo Js -->
<script src="{{ asset('scripts/demo.js') }}"></script>
<script src="{{ asset('scripts/material.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
@stack('scripts')
</body>
</html>
