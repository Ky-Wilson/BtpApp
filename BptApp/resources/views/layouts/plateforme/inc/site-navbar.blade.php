<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Cote d'ivoire / Daloa</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            {{-- <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div> --}}
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ route('bienvenue') }}" class="navbar-brand"><h1 class="text-primary display-6">GestImmo</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('maisons.index') }}" class="nav-item nav-link">Maisons</a>
                    <a href="{{ route('appartements.index') }}" class="nav-item nav-link">Appartements</a>
                    <a href="{{ route('immeubles.index') }}" class="nav-item nav-link">Immeubles</a>
                    <a href="{{ route('bureaux.index') }}" class="nav-item nav-link">Bureaux</a>
                    <a href="{{ route('terrains.index') }}" class="nav-item nav-link">Terrains</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Contacts et avis</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ route('contact.show') }}" class="dropdown-item">Besoin d'assistance</a>
                            <a href="{{ route('ratings.create') }}" class="dropdown-item">Notez une entreprise</a>
                            
                        </div>
                    </div>
                </div>
                <div class="d-flex m-3 me-0">
                    
                    <a href="{{ route('login') }}" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>