<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ pageTitle($title ?? null) }}</title>
        <link rel="icon" href="{{ asset('/images/favicon.jpg')}}" type="image/jpg">
        <!-- SCRIPT CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" crossorigin="anonymous">

        <!-- SCRIPT JS -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js" crossorigin="anonymous"></script>
        <script src="/js/ajax.js" crossorigin="anonymous"></script>

        <!-- CSS AND JS WITH VITE -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav>
            <div data-options="marginTop:0;">
                <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
                    <button class="menu-icon" type="button" data-toggle="example-menu"></button>
                    <div class="title-bar-title">Menu</div>
                </div>
                <div class="top-bar" id="example-menu">
                    <div class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li class="align-self-middle"><a href="{{ route('home') }}"><img width=100 src="{{ asset('/images/logo.png') }}" alt="{{ asset('/images/logo.png') }}"></a></li>
                            <li class="align-self-middle"><a href="{{ route('about') }}">A propos</a></li>
                            <li class="align-self-middle">
                                <a  href="{{ route('youths') }}">Jeunes</a>
                                <ul class="menu vertical">
                                <li><a href="#">One</a></li>
                                <li><a href="#">Two</a></li>
                                <li><a href="#">Three</a></li>
                                </ul>
                            </li>
                            <li class="align-self-middle">
                                <a href="{{ route('pros') }}">Pros</a>
                                <ul class="menu vertical">
                                <li><a href="#">One</a></li>
                                <li><a href="#">Two</a></li>
                                <li><a href="#">Three</a></li>
                                </ul>
                            </li>
                            <li class="align-self-middle"><a href="{{ route('news') }}">Actus</a></li>
                            <li class="align-self-middle"><a href="{{ route('jobs') }}">Offres d'emploi</a></li>
                            <li class="align-self-middle"><a href="">L'Europe s'engage</a></li>
                            <li class="align-self-middle"><a href="{{ route('contacts') }}">Contact</a></li>
                            <li class="align-self-middle"><a href=""  class="button">Me pr??-inscrire en ligne</a></li>
                            @guest
                                @if (Route::has('login'))
                                    <li class="align-self-middle">
                                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                                        <ul class="menu vertical">
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">S'inscrire</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @else
                                    <li class="align-self-middle">
                                        <a href="{{ route('account') }}">{{ Auth::user()->name }}</a>
                                        <ul class="menu vertical" aria-labelledby="navbarDropdown">
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">D??connexion</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main role="main">
            @if(Route::is('home'))
            <header>
                <div style="background-image: linear-gradient(180deg, #057FB0 0%, #009999 100%); opacity: 0.9;">
                    <div class="grid-container">
                        <div class="grid-x align-center medium-up-2">
                            <div class="cell align-self-middle">
                                <h1>Acc??l??rateur de projets !</h1>
                                <p>La <span> Mission Locale</span> accompagne des jeunes de 16 ?? 25 ans dans leur parcours d???insertion sociale et professionnelle.</p>
                                <div class="cell">
                                    <a href="" class="button">Puis-je m'inscrire</a>
                                    <a href="" class="button">En savoir plus</a>
                                </div>
                            </div>
                            <iframe class="align-self-middle" width="560" height="315" src="https://www.youtube.com/embed/EQ6OnCaY_Mk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </header>
            @endif