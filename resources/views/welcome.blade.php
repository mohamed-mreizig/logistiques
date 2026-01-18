<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $direction }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ s3Asset($logo ?? 'assets_home/Logo.png') }}" type="image/x-icon">
    @if ($direction === 'rtl')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif
    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- JavaScript Dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @yield('css')

    <!-- Inline Styles -->
    <style>
        #back-to-top {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #0DA853;
            color: white;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        #back-to-top:hover {
            background-color: #FCD605;
        }
    </style>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Nested dropdowns handler
            document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function(
                        menu) {
                        if (menu !== this.nextElementSibling) {
                            menu.style.display = 'none';
                        }
                    }.bind(this));

                    var dropdownMenu = this.nextElementSibling;
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' :
                        'block';
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.matches('.dropdown-submenu .dropdown-toggle')) {
                    document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function(menu) {
                        menu.style.display = 'none';
                    });
                }
            });

            // Back to top functionality
            window.onscroll = function() {
                var backToTopButton = document.getElementById("back-to-top");
                backToTopButton.style.display =
                    (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ?
                    "block" :
                    "none";
            };

            document.getElementById("back-to-top").onclick = function() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            };
        });
    </script>
</head>

<body>


    <div class="top-nav ">
        <div class="container" style="display: flex; align-items: center; gap: 10px; justify-content: flex-end;">
            @if (Route::has('login'))
                @auth
                    @can('view administration')
                        <form method="GET" action="" style="display: inline; max-width: 100px; width: 100%;">
                            @csrf
                            <a class="dropdown-item" href="{{ url('/administration') }}"
                                style="display: block; text-align: center; padding: 8px; width: 100%;">
                                {{ __('messages.administration') }}
                            </a>
                        </form>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}"
                        style="display: inline; max-width: 100px; width: 100%;">
                        @csrf
                        <a class="dropdown-item" href="route('logout')"
                            style="display: block; text-align: center; padding: 8px; width: 100%;"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('messages.logout') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        style="font-size: 14px; padding: 8px; text-align: center; max-width: 100px; width: 100%;">
                        {{ __('messages.login') }}
                    </a>
                    <a href="{{ route('register') }}"
                        style="padding: 8px; text-align: center; max-width: 100px; width: 100%;">
                        {{ __('messages.register') }}
                    </a>
                @endauth
            @endif
            <select id="language-select" onchange="window.location.href=this.value">
                <option value="{{ route('language.switch', 'fr') }}"
                    {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                <option value="{{ route('language.switch', 'ar') }}"
                    {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
            </select>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl" id="navbar-color">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ s3Asset($logo ?? 'assets_home/Logo.png') }}"
                        alt="Logo"></a>
            </div>

            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><i><img src="{{ asset('image/menu.png') }}" style="filter: brightness(0) invert(1);"
                            alt="" width="30px"></i></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}">
                        <a class="nav-link" style="font-size: 14px;" href="{{ url('/') }}">Accueil</a>
                    </li> --}}
                    {{-- <li
                        class="nav-item dropdown {{ request()->routeIs('presentation.index', 'direct.index', 'sitemap.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.snis') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ request()->routeIs('presentation.index') ? 'active' : '' }}"
                                href="{{ url('/presentation') }}"> {{ __('messages.mission_role_objective') }}</a>
                            <a class="dropdown-item {{ request()->routeIs('direct.index') ? 'active' : '' }}"
                                href="{{ url('/direct') }}"> {{ __('messages.coordinator_message') }}</a>
                            <a class="dropdown-item {{ request()->routeIs('sitemap.index') ? 'active' : '' }}"
                                href="{{ url('/sitemap') }}"> {{ __('messages.sitemap') }}</a>
                        </div>
                    </li> --}}
                    <li
                        class="nav-item dropdown {{ request()->routeIs('contact.index', 'historique.index', 'organigramme.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.about') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ request()->routeIs('direct.index') ? 'active' : '' }}"
                                href="{{ url('/direct') }}"> {{ __('messages.coordinator_message') }}</a>
                            <a class="dropdown-item {{ request()->routeIs('presentation.index') ? 'active' : '' }}"
                                href="{{ url('/presentation') }}"> {{ __('messages.presentation') }}</a>
                            {{-- <a class="dropdown-item {{ request()->routeIs('historique.index') ? 'active' : '' }}"
                                href="{{ url('/historique') }}"> {{ __('messages.history') }}</a> --}}
                            <a class="dropdown-item {{ request()->routeIs('organigramme.index') ? 'active' : '' }}"
                                href="{{ url('/organigramme') }}"> {{ __('messages.organizational_chart') }}</a>
                            <a class="dropdown-item {{ request()->routeIs('contact.index') ? 'active' : '' }}"
                                href="{{ url('/contact') }}"> {{ __('messages.contact_location') }}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('service.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.services') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if ($serviceVar && $serviceVar->count() > 0)
                                @foreach ($serviceVar as $typeS)
                                    <a class="dropdown-item {{ request()->is('service/' . $typeS->id) ? 'active' : '' }}"
                                        href="{{ url('service/' . $typeS->id) }}">{{ $typeS->type }}</a>
                                @endforeach
                            @else
                                <a class="dropdown-item justify-center"
                                    href="#">{{ __('messages.not_available') }}</a>

                            @endif
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ __('messages.data_stats') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('test/') }}">{{ __('messages.database') }}</a>
                            <a class="dropdown-item {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ url('categories/') }}">{{ __('messages.dashboard') }}</a>
                            <a class="dropdown-item"
                                href="{{ url('test/') }}">{{ __('messages.methodology_analysis') }}</a>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown {{ request()->routeIs('docs.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ __('messages.publications') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if ($sharedVar && $sharedVar->count() > 0)
                                @foreach ($sharedVar as $type)
                                    <a class="dropdown-item {{ request()->is('docs/' . $type->id) ? 'active' : '' }} "
                                        href="{{ url('docs/' . $type->id) }}">{{ $type->type }}</a>
                                @endforeach
                            @else
                                <a class="dropdown-item" href="#">{{ __('messages.not_available') }}</a>

                            @endif
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->routeIs('project.index', 'partenair.index', 'events.index') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" style="font-size: 14px;" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ __('messages.infoutile') }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul class="navbar-nav" style="display: block">
                                <li class="nav-item dropdown dropdown-submenu ">
                                    <a class="dropdown-item dropdown-toggle  {{ request()->routeIs('project.index', 'partenair.index') ? 'active' : '' }}"
                                        style="font-size: 14px;" href="#" id="navbarDropdownn" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('messages.projects_programs') }}
                                    </a>
                                    <div class="dropdown-menu" id="sbmn" aria-labelledby="navbarDropdownn">
                                        <a class="dropdown-item {{ request()->routeIs('project.index') ? 'active' : '' }}"
                                            href="{{ url('/project') }}"> {{ __('messages.project_management') }}</a>
                                        <a class="dropdown-item {{ request()->routeIs('partenair.index') ? 'active' : '' }}"
                                            href="{{ url('/partenair') }}"> {{ __('messages.partners') }}</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-submenu ">
                                    <a class="dropdown-item dropdown-toggle  {{ request()->routeIs('events.index') ? 'active' : '' }}"
                                        style="font-size: 14px;" href="#" id="navbarDropdownn" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('messages.training_events') }}
                                    </a>
                                    <div class="dropdown-menu" id="sbmn" aria-labelledby="navbarDropdownn">
                                        <a class="dropdown-item {{ request()->routeIs('events.index') ? 'active' : '' }}"
                                            href="{{ url('/events') }}">{{ __('messages.event_management') }}</a>
                                        <a class="dropdown-item {{ request()->routeIs('moocs.index') ? 'active' : '' }}"
                                            href="{{ route('moocs.index') }}">{{ __('messages.mooc') }}</a>
                                    </div>
                                </li>
                                {{-- <li class="nav-item dropdown dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" style="font-size: 14px;" href="#"
                                        id="navbarDropdownn" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ __('messages.resources') }}

                                    </a>
                                    <div class="dropdown-menu" id="sbmn" aria-labelledby="navbarDropdownn">
                                    @if ($ressource && $ressource->count() > 0)
                                            @foreach ($ressource as $res)
                                                <a class="dropdown-item"
                                                    href="{{ Str::startsWith($res->linkurl, ['http://', 'https://']) ? $res->linkurl : 'https://' . $res->linkurl }}"
                                                    target="_blank" rel="noopener noreferrer">{{ $res->titleFr }}</a>
                                            @endforeach
                                        @else
                                            <a class="dropdown-item" href="#">
                                                {{ __('messages.not_available') }}

                                            </a>
                                        @endif
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- main content -->



    <div style="display: flex; flex-direction: column;
            min-height: 100vh; ">

        <div style="flex-grow: 1; mb-4">
            @yield('content')
        </div>

        <footer class="footer">
            <!-- 4 Columns Section -->
            <div class="footer-columns container">
                <div class="footer-column">
                    <br>
                    <div class="logo" style="    justify-content: start;">

                        <a href="{{ url('/') }}"><img src="{{ s3Asset($logo ?? 'assets_home/Logo.png') }}"
                                alt="Logo"></a>
                    </div>
                    {{-- <h3> {{ __('messages.SNIS') }} </h3> --}}
                    @if (Route::has('login'))
                        @auth
                        @else
                            <button class="footer-button"
                                onclick="window.location.href='{{ route('login') }}'">{{ __('messages.subscribe') }}</button>
                        @endauth
                    @endif
                </div>
                <div class="footer-column">
                    <br>
                    <p style="    font-size: 20px;white-space: nowrap;">{{ __('messages.news_media') }}</p>
                    <p><a href="{{ route('actualites.index') }}"
                            style="color: white;text-decoration: none;">{{ __('messages.news') }}</a></p>
                    <p><a href="{{ route('media.index') }}"
                            style="color: white;text-decoration: none;">{{ __('messages.multimedia') }} (
                            {{ __('messages.photos') }} ,{{ __('messages.videos') }} )

                        </a>
                    </p>
                    {{-- <p><a href="{{ route('communique.index') }}"
                            style="color: white;text-decoration: none;">{{ __('messages.announcements') }} </a></p> --}}
                </div>

                <div class="footer-column">
                    <br>
                    <p style="    font-size: 20px;white-space: nowrap;">{{ __('messages.TG') }} </p>
                    <p style="white-space: nowrap;"> <a href="{{ route('politique.index') }}"
                            style="color: white;text-decoration: none;">{{ __('messages.PCD') }}</a></p>

                    @if ($footer)
                        @foreach ($footer as $item)
                            <p style="white-space: nowrap;"><a href="{{ url('docs/' . $item->id) }}"
                                    style="color: white;text-decoration: none;"> {{ $item->type }} </a></p>
                        @endforeach
                    @endif




                </div>
                {{-- <div class="footer-column"> --}}
                {{-- <br>
                    <p style="margin-top: 26px;">Multimédia</p>
                    <p>Communiqués</p> --}}
                {{-- </div> --}}

            </div>

            <!-- Divider -->
            <hr class="footer-divider container" />

            <!-- Social Media and Links -->
            <div class="footer-row container">
                <!-- Social Media Icons -->
                <div class="social-media">
                    @if ($socialLinks && $socialLinks->count() > 0)
                        <h6>Suivez-nous sur : &nbsp</h6>
                        @foreach ($socialLinks as $link)
                            @if ($link->isPublished)
                                <a href="{{ $link->url }}" class="social-icon" target="_blank">
                                    <img src="{{ s3Asset($link->icon) }}" alt="{{ $link->platform }}" />
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
                <!-- Links -->
                <div class="footer-links">
                    <p style="margin: 0; font-size: 12px;font-weight: 300">
                        &copy; {{ date('Y') }}
                        <span style="font-size: 12px;font-weight: 600">{{ __('messages.snis') }}</span>
                        {{ __('messages.SNIS') }}
                        <span style="font-size: 12px;font-weight: 600"> {{ __('messages.all_rights_reserved') }}
                        </span>
                    </p>
                </div>
            </div>
        </footer>
    </div>





    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i> <!-- You can use an icon library like FontAwesome -->
    </button>
</body>

</html>
