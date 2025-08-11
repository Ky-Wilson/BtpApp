<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('users.dashboard') }}" class="text-nowrap logo-img">
                            <img src="{{ asset(path: 'storage/' . Auth::user()->logo) }}" alt="Logo utilisateur" width="35" height="35" class="rounded-circle">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Tableau de bord</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">GESTION</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#collapseAds">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Annonces</span>
                    </a>
                    <ul id="collapseAds" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('users.ads.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="hide-menu">Liste des annonces</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('users.ads.create') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-plus"></i>
                                </span>
                                <span class="hide-menu">Créer une annonce</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.ratings.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-star"></i>
                        </span>
                        <span class="hide-menu">Notes & Avis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.appointments.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Rendez-vous</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </aside>