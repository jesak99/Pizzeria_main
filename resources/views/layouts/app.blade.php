<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Agregado nuevo -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-blue shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://images.vexels.com/media/users/3/131779/isolated/lists/3d4929d289ad98ad71637d5c257d2f08-logo-de-pizza-1.png" width="55" height="55" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pizza.index') }}">
                                <center>
                                    <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-pizzas.svg" width="40" height="40" alt="">
                                    <br>{{_('Pizzas')}}
                                </center>
                            </a>
                        </li>-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <center>
                                            <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-login.svg" width="40" height="40" alt="">
                                            <br>{{_('Iniciar Sesión')}}
                                        </center>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <center>
                                            <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-arma.svg" width="40" height="40" alt="">
                                            <br>{{ __('Registrarse') }}
                                        </center>
                                    </a>
                                </li>
                            @endif
                        @else
                        <br>
                        <br>
                        @if(Auth::user()->fullacces=='yes') 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pizza.index') }}">
                                <center>
                                    <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-pizzas.svg" width="40" height="40" alt="">
                                    <br>{{_('Pizzas')}}
                                </center>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pedidos.index')}}">
                                <center>
                                    <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-adicionales.svg" width="40" height="40" alt="">
                                    <br>{{_('Mis Pedidos')}}
                                </center>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('ordenes') }}">
                                <center>
                                    <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-cart.svg" width="40" height="40" alt="">
                                    <br>{{_('Mi Orden')}}
                                </center>
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="https://www.dominos.com.mx/cleans/images/icons_header/icon-login.svg" width="40" height="40" alt="">
                                    <br>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Direcciones') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
