<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets_Admin/font-awesome/css/font-awesome.min.css">
    <x-head.tinymce-config/>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/sidebar.js'])

 
    @yield('css')
    @stack('scripts')
    <style>
        .active-dropdown {
            color: #0DA853!important;
            /* blue-500 */
            font-weight: 600;
        }

        .active-link {
            background-color: #eff6ff !important;
            /* blue-50 */
            color:#0DA853!important;
            /* blue-500 */
            font-weight: 500;
        }


        .active-link:hover {
            background-color: #eff6ff !important;
        }

        .nested-dropdown-toggle {
            background: transparent !important;
            text-align: left;
            width: 100%;
        }

        .nested-dropdown-toggle:hover {
            background-color: #eff6ff !important;
        }

        #default-projects-menu {
            border-left: 2px solid #e5e7eb;
            margin-left: 0.5rem;
        }

        @media (max-width: 1023px) {
            #sidebar {
                width: 80%;
                max-width: 300px;
            }

            #sidebarOverlay {
                transition: opacity 0.3s ease;
            }

            body.overflow-hidden {
                overflow: hidden;
            }
        }

        /* Sidebar Animation */
        #sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Add to your existing styles */
        #userMenu {
            transition: opacity 0.2s ease, transform 0.2s ease;
            transform-origin: top right;
        }

        #userMenu a,
        #userMenu button {
            transition: background-color 0.2s ease;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-64 bg-white shadow-lg fixed lg:static h-full z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
            <div class="p-4 border-b border-gray-100">
                <h1 class="text-2xl font-bold text-gray-500 hover:text-gray-700 flex items-center justify-center">
                    <a href="{{ route('home.index') }}">DPTCDES</a>
                </h1>
            </div>
            <nav class="p-5 overflow-y-auto flex-1">

                <div class="mb-4">
                    <a href="{{ route('administration.index') }} "
                        class="flex items-center w-full py-2 text-xs font-semibold text-gray-500 uppercase hover:text-gray-700 rounded-lg transition-colors duration-200 [&.active-link]:px-2 {{ request()->routeIs('administration.index') ? 'active-link' : '' }}">
                        Administration
                    </a>
                </div>
                <div class="mb-4">
                    <button
                        class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 hover:text-gray-700 transition-colors duration-200 dropdown-toggle"
                        data-target="dashboard-menu">
                        Gestion D'Acces
                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <ul id="dashboard-menu" class="space-y-2 mt-2 pl-2">
                    
                        <li class="mb-1">
                            <a href="{{ route('users.index') }}"
                             class="block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded {{ request()->routeIs('users.index') ? 'active-link' : '' }} ">
                             Utilisateurs</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.index') ? 'active-link' : '' }} block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Roles</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('permissions.index') }}"
                                class="block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded {{ request()->routeIs('permissions.index') ? 'active-link' : '' }} ">Permissions</a>
                        </li>
                    </ul>
                </div>



                <!-- Gestion De Contenue Section -->
                <div class="mb-4">
                    <button
                        class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 hover:text-gray-700 transition-colors duration-200 dropdown-toggle"
                        data-target="ui-menu">
                        Gestion De Contenue
                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <ul id="ui-menu" class="hidden space-y-2 mt-2 pl-2">
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 nested-dropdown-toggle"
                                    data-target="parametres-menu">
                                    Parametres
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="parametres-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('logoad.index') }}"
                                            class=" {{ request()->routeIs('logoad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">App Logo</a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('settings.index') }}"
                                            class=" {{ request()->routeIs('settings.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Slider</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('externallinks.index') }}"
                                            class="{{ request()->routeIs('externallinks.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">Lien Rapides</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('indicators.index') }}"
                                            class="{{ request()->routeIs('indicators.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">Indicateurs
                                            clés</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            {{-- <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 nested-dropdown-toggle"
                                    data-target="SNIS-menu">
                                    SNIS
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="SNIS-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('mission.index') }}"
                                            class="{{ request()->routeIs('mission.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">Présentation</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('motdirectad.index') }}"
                                            class="{{ request()->routeIs('motdirectad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Mots
                                            du Coordinateur</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.sitemap.index') }}"
                                            class="{{ request()->routeIs('admin.sitemap.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">Sitemap</a>
                                    </li>

                                </ul>
                            </div> --}}
                        </li>
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 nested-dropdown-toggle"
                                    data-target="propos-menu">
                                    À propos
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="propos-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('motdirectad.index') }}"
                                            class="{{ request()->routeIs('motdirectad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Mots
                                            du Directeur</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mission.index') }}"
                                            class="{{ request()->routeIs('mission.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">Présentation</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('histoad.index') }}"
                                            class="{{ request()->routeIs('histoad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">Historique</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('orgad.index') }}"
                                            class="{{ request()->routeIs('orgad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Organigramme</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contad.index') }}"
                                            class="{{ request()->routeIs('contad.index') ? 'active-link' : '' }} block px 3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">Contact
                                            et Localisation</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 nested-dropdown-toggle"
                                    data-target="services-menu">
                                    Axes Stratégiques
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="services-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('servicetad.index') }} "
                                            class=" {{ request()->routeIs('servicetad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">
                                            Axe stratégique    
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('servicead.index') }}"
                                            class="{{ request()->routeIs('servicead.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">
                                            Élèment d'axe stratégique</a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li>
                            {{-- <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap nested-dropdown-toggle"
                                    data-target="donnee-menu">
                                    Données et Statistiques
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="donnee-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{route('empty.index') }}"
                                            class="block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">
                                            Base de données</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('categoriesad.index') }}"
                                            class="{{ request()->routeIs('categoriesad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Tableau de bord</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('empty.index') }}"
                                            class="block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Méthodologie et Analyse</a>
                                    </li>


                                </ul>
                            </div> --}}
                        </li>
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap nested-dropdown-toggle"
                                    data-target="publication-menu">
                                    Publications et
                                        Ressources
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="publication-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('documentad.index') }}"
                                            class="{{ request()->routeIs('documentad.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">
                                            Document type</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('document.index') }}"
                                            class="{{ request()->routeIs('document.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Document</a>
                                    </li>
                                


                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap nested-dropdown-toggle"
                                    data-target="projet-menu">
                                    Projets et Programmes
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="projet-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('projet.index') }}"
                                            class="{{ request()->routeIs('projet.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">
                                            Gestion de projets</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('partners.index') }}"
                                            class="{{ request()->routeIs('partners.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">Partenaires</a>
                                    </li>
                                


                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="relative">
                                <button
                                    class="flex items-center justify-between w-full px-2 py-1 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap nested-dropdown-toggle"
                                    data-target="formation-menu">
                                    Formation et Événements
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="formation-menu" class="hidden pl-4 mt-2 space-y-2">
                                    <li>
                                        <a href="{{ route('event.index') }}"
                                            class="{{ request()->routeIs('event.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 whitespace-nowrap">
                                            Événements</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mooc.index') }}"
                                            class="{{ request()->routeIs('mooc.index') ? 'active-link' : '' }} block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200 ">MOOC</a>
                                    </li>
                                


                                </ul>
                            </div>
                        </li>
                      
                        {{-- <li class="mb-1">
                            <a href="{{route('ressource.index')}}"
                             class="{{request()->routeIs('ressource.index') ? 'active-link':''}} block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">
                                Ressource</a>
                        </li> --}}
                       
                    </ul>
                </div>

                <!-- Gestion Footer Section -->
                <div class="mb-4">
                    <button
                        class="flex items-center justify-between w-full text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 hover:text-gray-700 transition-colors duration-200 dropdown-toggle"
                        data-target="footer-menu">
                        Gestion Footer
                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <ul id="footer-menu" class="hidden space-y-2 mt-2 pl-2">
                        <li class="mb-1">
                            <a href="{{route('actualite.index')}}"
                                class="{{request()->routeIs('actualite.index') ? 'active-link':''}}  block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Actualite</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{route('multimedia.index')}}"
                                class="{{request()->routeIs('multimedia.index') ? 'active-link':''}}  block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Multimédia</a>
                        </li>
                        {{-- <li class="mb-1">
                            <a href="{{route('comunique.index')}} "
                                class="{{request()->routeIs('comunique.index') ? 'active-link':''}}  block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Communique</a>
                        </li> --}}
                        <li class="mb-1">
                            <a href="{{route('politiquead.index')}} "
                                class="{{request()->routeIs('politiquead.index') ? 'active-link':''}} block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Politique et confidentialité</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{route('social.index')}}"
                                class="{{request()->routeIs('social.index') ? 'active-link':''}} block px-2 py-1 text-sm text-gray-700 hover:bg-gray-100 rounded">Social Media</a>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <a href="{{ route('admin.messages.index') }}" 
                        class="flex items-center w-full py-2 text-xs font-semibold text-gray-500 uppercase hover:text-gray-700 rounded-lg transition-colors duration-200 [&.active-link]:px-2 {{ request()->routeIs('admin.messages.index') ? 'active-link' : '' }}">
                        Messages
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <header class="bg-white shadow-sm border-b border-gray-100">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="ml-2 text-lg font-semibold text-gray-800">Administration</h2>
                    </div>
                    <div class="flex items-center">
                        {{-- <div class="relative">
                            <button class="text-gray-500 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </button>
                            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                        </div> --}}
                        <div class="ml-4 relative">
                            <button id="userMenuButton"
                                class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center focus:outline-none">
                                @auth
                                    <span class="text-gray-600 text-sm">{{ substr(auth()->user()->name, 0, 2) }}</span>
                                @else
                                    <span class="text-gray-600 text-sm">GU</span>
                                @endauth
                            </button>

                            <!-- Dropdown menu -->
                            <div id="userMenu"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a  href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Voir le
                                    Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Se Deconnecter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4">
                @yield('pagecontent')
            </main>
        </div>
    </div>
</body>

</html>
