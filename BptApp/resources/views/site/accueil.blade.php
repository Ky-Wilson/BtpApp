@extends('layouts.plateforme.master')
@section('content')
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7 text-center text-lg-start">
                <h4 class="mb-3 text-secondary">Votre partenaire immobilier de confiance</h4>
                <h1 class="mb-5 display-3 text-primary">Trouvez la maison de vos rêves</h1>
<p class="text-white text-secondary mb-5" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 5px;">Découvrez une sélection unique de biens immobiliers qui correspondent à votre style de vie et à vos ambitions. Votre future maison vous attend.</p>                <a href="{{ route('terrains.index') }}" class="btn btn-primary border-2 border-secondary py-3 px-5 rounded-pill text-white mt-3">Explorer nos biens</a>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="{{ asset('assets/plateforme/img/car1.jpg') }}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="Villa moderne">
                        </div>
                        <div class="carousel-item rounded">
                            <img src="{{ asset('assets/plateforme/img/car2.webp') }}" class="img-fluid w-100 h-100 rounded" alt="Appartement luxueux">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{ asset('assets/plateforme/img/chantier-de-construction.webp') }}" class="img-fluid rounded" alt="Équipe de l'agence immobilière">
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="mb-3 text-secondary">À propos de nous</h4>
                <h1 class="mb-5 display-5 text-primary">Agence Immobilière de Confiance</h1>
                <p>Notre plateforme immobilière est conçue pour simplifier la recherche et la gestion de biens. Nous proposons un moteur de recherche avancée et des filtres dynamiques pour aider les visiteurs à trouver leur bien idéal. Nous accompagnons également les entreprises en leur offrant un espace pour gérer leur profil, publier des annonces détaillées et suivre leurs performances. La modération des annonces et la validation des comptes sont assurées par notre équipe d'administrateurs pour garantir la qualité et la transparence des transactions.</p>
                <div class="d-flex align-items-center mt-4">
                    <a href="maisons.index" class="btn btn-primary rounded-pill py-3 px-5 me-3">Nos annonces</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid services py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h4 class="mb-3 text-secondary">Nos services</h4>
            <h1 class="mb-5 display-5 text-primary">Comment pouvons-nous vous aider ?</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="service-item text-center rounded bg-light p-4">
                    <div class="service-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-home fa-3x text-white"></i>
                    </div>
                    <div class="service-content text-center">
                        <h5>Achat & Vente</h5>
                        <p class="mb-0">Nous vous aidons à trouver ou à vendre le bien immobilier qui correspond à vos attentes.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item text-center rounded bg-light p-4">
                    <div class="service-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-key fa-3x text-white"></i>
                    </div>
                    <div class="service-content text-center">
                        <h5>Location</h5>
                        <p class="mb-0">Un large choix de biens à louer pour particuliers et professionnels.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item text-center rounded bg-light p-4">
                    <div class="service-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-handshake fa-3x text-white"></i>
                    </div>
                    <div class="service-content text-center">
                        <h5>Gestion locative</h5>
                        <p class="mb-0">Confiez-nous la gestion de vos biens immobiliers en toute sérénité.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mx-auto">
                <div class="service-item text-center rounded bg-light p-4">
                    <div class="service-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-chart-line fa-3x text-white"></i>
                    </div>
                    <div class="service-content text-center">
                        <h5>Publication et suivi d'annonces</h5>
                        <p class="mb-0">Pour les entreprises, notre plateforme permet de publier des annonces et de suivre les interactions.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill py-2 px-4 mt-3">Créer votre compte pro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h4 class="mb-3 text-secondary">Notre Engagement</h4>
            <h1 class="mb-5 display-5 text-primary">Nos valeurs au cœur de notre service</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-white rounded p-4 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-handshake fa-4x text-primary mb-3"></i>
                    <h5 class="fw-bold">Confiance</h5>
                    <p class="mb-0">Nous bâtissons des relations durables basées sur l'honnêteté et la transparence.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-white rounded p-4 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-star fa-4x text-primary mb-3"></i>
                    <h5 class="fw-bold">Qualité</h5>
                    <p class="mb-0">Nous offrons un service irréprochable et des biens immobiliers d'exception.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-white rounded p-4 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-users-cog fa-4x text-primary mb-3"></i>
                    <h5 class="fw-bold">Service Client</h5>
                    <p class="mb-0">Notre équipe est dédiée à répondre à vos besoins avec professionnalisme et réactivité.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-white rounded p-4 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-check-circle fa-4x text-primary mb-3"></i>
                    <h5 class="fw-bold">Efficacité</h5>
                    <p class="mb-0">Nous simplifions vos démarches pour vous aider à trouver votre bien rapidement.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection