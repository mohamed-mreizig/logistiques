<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark" style="justify-content: center;">
            <a href="{{ route('home.index') }}" class="logo">
                <img src="{{ asset('assets_home/dashboard.png') }}" alt="navbar brand" class="navbar-brand" height="20"
                    style="filter: brightness(0) invert(1);" />
            </a>
            <div class="nav-toggle">

                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs('administration.index') ? 'active' : '' }}">
                    <a {{-- data-bs-toggle="collapse" --}} href="{{ route('administration.index') }}" {{-- class="collapsed" --}}
                        {{-- aria-expanded="false" --}}>
                        <i class="fas fa-home"></i>
                        <p>Administration</p>
                    </a>

                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">super-admin</h4>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('users.index', 'roles.index', 'permissions.index') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#gestion">
                        <i class="fas fa-layer-group"></i>
                        <p>Gestion D'Acces</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('users.index', 'roles.index', 'permissions.index') ? 'show' : '' }}"
                        id="gestion">
                        <ul class="nav nav-collapse">

                            @can('view user')
                                <li class="{{ request()->routeIs('users.index') ? 'active' : '' }} ">
                                    <a href="{{ route('users.index') }}">
                                        <span class="sub-item">Users</span>
                                    </a>
                                </li>
                            @endcan

                            @can('view role')
                                <li class="{{ request()->routeIs('roles.index') ? 'active' : '' }} ">


                                    <a href="{{ route('roles.index') }}">
                                        <span class="sub-item">Roles</span>
                                    </a>
                                </li>
                            @endcan

                            @can('view permission')
                                <li class="{{ request()->routeIs('permissions.index') ? 'active' : '' }} ">

                                    <a href="{{ route('permissions.index') }}">
                                        <span class="sub-item">Permissions</span>
                                    </a>
                                </li>
                            @endcan


                        </ul>
                    </div>
                </li>
               

                {{-- section jdid --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Gestion De Contenue</h4>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('indicators.index','settings.index','externallinks.index','mission.index', 'motdirectad.index','admin.sitemap.index', 'histoad.index', 'orgad.index', 'contad.index', 'empty.index', 'servicetad.index', 'servicead.index', 'documentad.index', 'document.index', 'projet.index', 'partners.index', 'event.index','mooc.index','ressource.index') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Acceuil</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse  {{ request()->routeIs('indicators.index','settings.index','externallinks.index','mission.index', 'motdirectad.index','admin.sitemap.index', 'histoad.index', 'orgad.index', 'contad.index', 'empty.index', 'servicetad.index', 'servicead.index', 'documentad.index', 'document.index', 'projet.index', 'partners.index', 'event.index','mooc.index','ressource.index') ? 'show' : '' }}"
                        id="submenu">
                        <ul class="nav nav-collapse">
                           
                            <li
                                class="{{ request()->routeIs('indicators.index','settings.index','externallinks.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#param">
                                    <span class="sub-item">Parametres</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse  {{ request()->routeIs('indicators.index','settings.index','externallinks.index') ? 'show' : '' }}"
                                    id="param">
                                    <ul class="nav nav-collapse subnav">
                                        <li class=" {{ request()->routeIs('settings.index') ? 'active' : '' }}">
                                            <a href="{{ route('settings.index') }}">
                                                <span class="sub-item">Slider</span>
                                            </a>
                                        </li>
                                        <li class=" {{ request()->routeIs('externallinks.index') ? 'active' : '' }}">
                                            <a href="{{ route('externallinks.index') }}">
                                                <span class="sub-item">Lien Rapides</span>
                                            </a>
                                        </li>
                                        <li class=" {{ request()->routeIs('indicators.index') ? 'active' : '' }}">
                                            <a href="{{ route('indicators.index') }}">
                                                <span class="sub-item">Indicateurs clés
                                                </span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="{{ request()->routeIs('mission.index', 'motdirectad.index','admin.sitemap.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">SNIS</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse  {{ request()->routeIs('mission.index', 'motdirectad.index','admin.sitemap.index') ? 'show' : '' }}"
                                    id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li class=" {{ request()->routeIs('mission.index') ? 'active' : '' }}">
                                            <a href="{{ route('mission.index') }}">
                                                <span class="sub-item">Mission , role et objectif</span>
                                            </a>
                                        </li>
                                        <li class=" {{ request()->routeIs('motdirectad.index') ? 'active' : '' }}">
                                            <a href="{{ route('motdirectad.index') }}">
                                                <span class="sub-item">Mots du Coordinateur</span>
                                            </a>
                                        </li>
                                        <li class=" {{ request()->routeIs('admin.sitemap.index') ? 'active' : '' }}">

                                            <a href="{{ route('admin.sitemap.index') }}">
                                                <span class="sub-item">Sitemap</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="{{ request()->routeIs('histoad.index', 'orgad.index', 'contad.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav2">
                                    <span class="sub-item"> À propos</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('histoad.index', 'orgad.index', 'contad.index') ? 'show' : '' }}"
                                    id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{ request()->routeIs('histoad.index') ? 'active' : '' }}">
                                            <a href="{{ route('histoad.index') }}">
                                                <span class="sub-item">Historique</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('orgad.index') ? 'active' : '' }}">
                                            <a href="{{ route('orgad.index') }}">
                                                <span class="sub-item">Organigramme</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('contad.index') ? 'active' : '' }}">
                                            <a href="{{ route('contad.index') }}">
                                                <span class="sub-item">Contact et Localisation</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="{{ request()->routeIs('servicetad.index', 'servicead.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav3">
                                    <span class="sub-item">Services et Fonctions</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('servicetad.index', 'servicead.index') ? 'show' : '' }}"
                                    id="subnav3">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{ request()->routeIs('servicetad.index') ? 'active' : '' }}">
                                            <a href="{{ route('servicetad.index') }} ">
                                                <span class="sub-item"> Service type</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('servicead.index') ? 'active' : '' }}">
                                            <a href=" {{ route('servicead.index') }}  ">
                                                <span class="sub-item">Services </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="{{ request()->routeIs('empty.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav4">
                                    <span class="sub-item">Données et Statistiques</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('empty.index') ? 'show' : '' }}"
                                    id="subnav4">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="{{ route('empty.index') }}">
                                                <span class="sub-item">Base de données</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('empty.index') }}">
                                                <span class="sub-item">Tableau de bord</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('empty.index') }}">
                                                <span class="sub-item">Méthodologie et Analyse</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li
                                class="{{ request()->routeIs('documentad.index', 'document.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav5">
                                    <span class="sub-item" style="white-space: nowrap;">Publications et
                                        Ressources</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('documentad.index', 'document.index') ? 'show' : '' }}"
                                    id="subnav5">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{ request()->routeIs('documentad.index') ? 'active' : '' }}">
                                            <a href="{{ route('documentad.index') }} ">
                                                <span class="sub-item"> Document type</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('document.index') ? 'active' : '' }}">
                                            <a href=" {{ route('document.index') }}  ">
                                                <span class="sub-item">Document </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="{{ request()->routeIs('projet.index', 'partners.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav6">
                                    <span class="sub-item"> Projets et Programmes</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('projet.index', 'partners.index') ? 'show' : '' }}"
                                    id="subnav6">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{ request()->routeIs('projet.index') ? 'active' : '' }}">
                                            <a href="{{ route('projet.index') }}">
                                                <span class="sub-item">Gestion de projets</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('partners.index') ? 'active' : '' }}">
                                            <a href="{{ route('partners.index') }}">
                                                <span class="sub-item">Partenaires</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="{{ request()->routeIs('event.index','mooc.index') ? 'active' : '' }}">
                                <a data-bs-toggle="collapse" href="#subnav7">
                                    <span class="sub-item"> Formation et Événements</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse {{ request()->routeIs('event.index','mooc.index') ? 'show' : '' }}"
                                    id="subnav7">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{ request()->routeIs('event.index') ? 'active' : '' }}">
                                            <a href=" {{ route('event.index') }} ">
                                                <span class="sub-item">Événements</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs('mooc.index') ? 'active' : '' }}">
                                            <a href="{{ route('mooc.index') }}">
                                                <span class="sub-item">MOOC</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                          
                            <li class="{{request()->routeIs('ressource.index') ? 'active':''}} ">
                                <a href="{{route('ressource.index')}}">
                                  <span class="sub-item">Ressource</span>
                                </a>
                              </li>
                      
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('actualite.index','comunique.index','multimedia.index','politiquead.index','social.index')? 'active' : '' }} ">
                    <a data-bs-toggle="collapse" href="#footer">
                        <i class="fas fa-layer-group"></i>
                        <p>Gestion Footer</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('actualite.index','multimedia.index','comunique.index','politiquead.index','social.index')? 'show' : '' }} " id="footer">
                        <ul class="nav nav-collapse">



                          <li class="{{request()->routeIs('actualite.index') ? 'active':''}} ">
                            <a href="{{route('actualite.index')}}">
                              <span class="sub-item">Actualite</span>
                            </a>
                          </li>

                          <li class="{{request()->routeIs('multimedia.index') ? 'active':''}} ">
                            <a href="{{route('multimedia.index')}}">
                              <span class="sub-item">Multimédia</span>
                            </a>
                          </li>



                          <li class=" {{request()->routeIs('comunique.index') ? 'active':''}} ">


                              <a href=" {{route('comunique.index')}} ">
                                  <span class="sub-item">Communique</span>
                              </a>
                          </li>
                          <li class=" {{request()->routeIs('politiquead.index') ? 'active':''}} ">


                              <a href=" {{route('politiquead.index')}} ">
                                  <span class="sub-item">Politique et confidentialité</span>
                              </a>
                          </li>
                          <li class=" {{request()->routeIs('social.index') ? 'active':''}} ">


                              <a href=" {{route('social.index')}} ">
                                  <span class="sub-item">Social Media</span>
                              </a>
                          </li>
                  



                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.messages.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.messages.index') }}" 
                       >
                        <i class="fas fa-comment"></i>
                        <p>Messages</p>
                    </a>

                </li>
               
            </ul>
        </div>
    </div>
</div>
