<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img">
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
                    <span class="hide-menu">Accueil</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span><i class="ti ti-layout-dashboard"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Gestion</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span><i class="ti ti-users"></i></span>
                        <span class="hide-menu">Utilisateurs</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="{{ route('admin.users.index') }}" class="sidebar-link">
                            <i class="ti ti-list"></i> Liste des utilisateurs
                        </a></li>
                        <li class="sidebar-item"><a href="{{ route('admin.users.create') }}" class="sidebar-link">
                            <i class="ti ti-plus"></i> Créer un utilisateur
                        </a></li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span><i class="ti ti-list"></i></span>
                        <span class="hide-menu">Catégories</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                            <i class="ti ti-list-details"></i> Liste des catégories
                        </a></li>
                        <li class="sidebar-item"><a href="{{ route('admin.categories.create') }}" class="sidebar-link">
                            <i class="ti ti-plus"></i> Créer une catégorie
                        </a></li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span><i class="ti ti-files"></i></span>
                        <span class="hide-menu">Annonces</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.ads.index') }}" class="sidebar-link">
                                <i class="ti ti-list-check"></i>
                                <span class="hide-menu">Toutes les annonces</span>
                            </a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('admin.appointments.index') }}" class="sidebar-link">
                            <i class="ti ti-calendar"></i> Rendez-vous
                        </a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Outils</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.stats.index') }}" aria-expanded="false">
                        <span><i class="ti ti-chart-bar"></i></span>
                        <span class="hide-menu">Statistiques</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span><i class="ti ti-bell-ringing {{ $pendingAds > 0 ? 'text-danger' : '' }}"></i></span>
                        <span class="hide-menu">
                            Notifications
                            @if($pendingAds > 0)
                                <span class="badge bg-danger rounded-pill ms-2">{{ $pendingAds }}</span>
                            @endif
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="{{ route('notifications.users.index') }}" class="sidebar-link">
                            <i class="ti ti-user-exclamation"></i> Pour utilisateurs
                        </a></li>
                        <li class="sidebar-item"><a href="{{ route('notifications.ads.index') }}" class="sidebar-link">
                            <i class="ti ti-file-alert"></i> Pour annonces
                        </a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Authentification</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                        <span><i class="ti ti-logout"></i></span>
                        <span class="hide-menu">Déconnexion</span>
                    </a>
                </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                </div>
        </nav>
        </div>
    </aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>