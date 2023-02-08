<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;600;800&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="d-flex align-items-center text-dark-red fw-bold sticky-top flex-md-nowrap py-4 shadow-sm">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ url('/') }}"><img class="img-fluid"
                    src="{{ asset('/img/deliveboo-logo.png') }}" alt="deliveboo-logo"></a>
            <ul class="navbar-nav ml-auto pe-4 ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <ul class=" dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- header -->

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block px-0 sidebar collapse">
                    <div class="pt-3 sidebar-sticky">
                        <ul class="nav flex-column text-uppercase">
                            <li class="nav-item pt-3">
                                <a class=" nav-link" aria-current="page" href="">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    <i class="fa-solid fa-utensils pe-2"></i>
                                    Statistiche
                                </a>
                            </li>
                            <li class="nav-item pt-1">
                                <a class="nav-link" href="{{ route('admin.plates.index') }}">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    <i class="fa-solid fa-utensils pe-2"></i>
                                    Menu
                                </a>
                            </li>
                            <li class="nav-item pt-1">
                                <a class="nav-link" href="#">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    <i class="fa-solid fa-utensils pe-2"></i>
                                    Nuovo piatto
                                </a>
                            </li>
                            <li class="nav-item pt-1">
                                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    <i class="fa-solid fa-utensils pe-2"></i>
                                    Riepilogo ordini
                                </a>
                            </li>
                            <li class="nav-item pt-1">
                                <a class="nav-link" href="#">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    <i class="fa-solid fa-utensils pe-2"></i>
                                    La tua cucina
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <!-- nav -->

                <main class="col-md-9 ms-sm-auto col-lg-10">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
