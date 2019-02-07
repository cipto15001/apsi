<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    {{--<link rel='stylesheet prefetch' href='https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css'>--}}
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/palette.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/polyfill/dialog-polyfill.css') }}">

    @stack('style')
</head>
<body style="height: 100%; background-color: #eee">
<div class="mdl-layout mdl-js-layout">
    @auth
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" style="height: 100%">
            <header class="mdl-layout__header" style="background-color: #fdc02f">
                <div class="mdl-layout__header-row" style="padding-right: 20px">
                    <div class="mdl-layout-spacer"></div>
                    <h6 style="padding-right: 20px;">{{ auth()->user()->name }}</h6>
                    <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon user">
                        <img src="http://placehold.it/200x200" class="user">
                    </button>
                    {!! Form::open([
                        'url' => route('logout'),
                        'id' => 'form-logout',
                    ]) !!}
                    {!! Form::close(); !!}
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                        <li class="mdl-menu__item">Profile</li>
                        <li class="mdl-menu__item">Account</li>
                        <li class="mdl-menu__item" style="border-top: 1px solid #eee" onclick="document.getElementById('form-logout').submit()">
                            Logout
                        </li>
                    </ul>
                </div>
            </header>

            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">APSI</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="{{ route('jobs.index') }}"><i class="fas fa-hdd fa-ms" style="margin-right: 10px;"></i>Jobs</a>
                    @if (auth()->user()->role == 'admin')
                        <a class="mdl-navigation__link" href="{{ route('simulations.index') }}"><i class="fas fa-hdd fa-ms" style="margin-right: 10px;"></i>Simulations</a>
                        <a class="mdl-navigation__link" href="{{ route('users.index') }}"><i class="fas fa-hdd fa-ms" style="margin-right: 10px;"></i>Users</a>
                    @endif
                </nav>
            </div>
            @endauth
            <main class="mdl-layout__content" style="">
                @yield('content')
            </main>
            @auth
        </div>
    @endauth
</div>

@yield('non-main-content')
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('vendors/polyfill/dialog-polyfill.js') }}"></script>
<script src="{{ asset('scripts/material.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
@stack('scripts')
</body>
</html>
