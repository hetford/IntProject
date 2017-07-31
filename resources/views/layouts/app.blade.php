<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <ul id="documentdrop" class="dropdown-content">
        <li><a href="{{ route('home') }}">View Documents</a></li>
        @if(!Auth::guest())
            @if(Auth::user()->role == 'System Admin')
                <li><a href="{{ route('archiveindex') }}">Document Archive</a></li>
            @endif
        @endif
        <li><a href="{{ route('documentadd') }}">Add Documents</a></li>
    </ul>
    <ul id="userdrop" class="dropdown-content">
        <li><a href="{{ route('sysadminuserindex') }}">View Users</a></li>
        <li><a href="{{ route('register') }}">Add Users</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <a class="brand-logo" href="{{ url('/') }}">
                Capgemini / IBM <span id="brand-document">Document Management</span>
            </a>

            <ul class="right hide-on-med-and-down">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li><a>Welcome {{Auth::User()->name}} ({{ Auth::User()->role}})</a></li>
                    @if(Auth::User()->role == 'System Admin')
                        <li><a class="dropdown-button" href="#!" data-activates="userdrop">Users<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    @endif
                    <li><a class="dropdown-button" href="#!" data-activates="documentdrop">Documents<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
            <ul id="documentdropMob" class="dropdown-content">
                <li><a href="{{ route('home') }}">View Documents</a></li>
                @if(!Auth::guest())
                    @if(Auth::user()->role == 'System Admin')
                        <li><a href="{{ route('archiveindex') }}">Document Archive</a></li>
                    @endif
                @endif
                <li><a href="{{ route('documentadd') }}">Add Documents</a></li>
            </ul>
            <ul id="userdropMob" class="dropdown-content">
                <li><a href="{{ route('sysadminuserindex') }}">View Users</a></li>
                <li><a href="{{ route('register') }}">Add Users</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    @if(Auth::user()->role == 'System Admin')
                        <li><a class="dropdown-button" href="#!" data-activates="userdropMob">Users<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    @endif
                    <li><a class="dropdown-button" href="#!" data-activates="documentdropMob">Documents<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</div>

<!-- Scripts -->

<!-- Compiled and minified JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.button-collapse').sideNav();
        $('.dropdown-button').dropdown({
            hover: false,
            belowOrigin: true
        });
        $('select').material_select();
    });

</script>
</body>
</html>
