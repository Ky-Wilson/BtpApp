@extends('layouts.plateforme.master')
@section('content')
<!-- Hero Start -->
      <div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">Votre partenaire immobilier</h4>
                <h1 class="mb-5 display-3 text-primary">Trouvez le terrain de vos rêves</h1>
                <div class="position-relative mx-auto">
                    <form action="{{ route('terrains.index') }}" method="GET">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="location" placeholder="Rechercher un terrain par localisation...">
                        <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Rechercher</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($carousel_ads as $key => $ad)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                                @if (isset($ad->images[0]))
                                    <img src="{{ asset('storage/' . $ad->images[0]) }}" class="img-fluid w-100 rounded" style="height: 400px; object-fit: cover;" alt="Terrain {{ $ad->type }}">
                                @else
                                    <img src="{{ asset('path/to/default-image.jpg') }}" class="img-fluid w-100 rounded" style="height: 400px; object-fit: cover;" alt="Image par défaut">
                                @endif
                                <a href="{{ route('terrains.show', $ad) }}" class="btn px-4 py-2 text-white rounded">
                                    Details
                                </a>
                            </div>
                        @endforeach
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
        <!-- Hero End -->


        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-bullhorn fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Visibilité Maximale</h5>
                                <p class="mb-0">Atteignez des milliers d'acheteurs potentiels</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-edit fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Gestion Facile</h5>
                                <p class="mb-0">Modifiez vos annonces à tout moment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-comments-dollar fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Contacts Directs</h5>
                                <p class="mb-0">Mise en relation sans intermédiaire</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-chart-line fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Statistiques de Vente</h5>
                                <p class="mb-0">Suivez la performance de vos annonces</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Fruits Shop Start-->
            <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-2 text-start">
                            <h1>Terrains</h1>
                        </div>
                        <div class="col-lg-10 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill {{ request('price_range') == null ? 'active' : '' }}" href="{{ route('terrains.index') }}">
                                        <span class="text-dark" style="width: 200px;">Toutes les annonces</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill {{ request('price_range') == 'low' ? 'active' : '' }}" href="{{ route('terrains.index', ['price_range' => 'low']) }}">
                                        <span class="text-dark" style="width: 130px;"> < 500 000</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill {{ request('price_range') == 'medium' ? 'active' : '' }}" href="{{ route('terrains.index', ['price_range' => 'medium']) }}">
                                        <span class="text-dark" style="width: 190px;">500 001 - 1 200 000</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill {{ request('price_range') == 'high' ? 'active' : '' }}" href="{{ route('terrains.index', ['price_range' => 'high']) }}">
                                        <span class="text-dark" style="width: 190px;">1 200 001 - 1 800 000</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill {{ request('price_range') == 'very_high' ? 'active' : '' }}" href="{{ route('terrains.index', ['price_range' => 'very_high']) }}">
                                        <span class="text-dark" style="width: 190px;"> > 2 000 000</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @forelse ($ads as $ad)
                                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                            <div class="rounded position-relative fruite-item d-flex flex-column" style="height: 440px;">
                                                <div class="fruite-img" style="height: 150px; overflow: hidden;">
                                                    <img src="{{ asset('storage/' . $ad->first_image) }}" class="img-fluid w-100 h-100 rounded-top" style="object-fit: cover;" alt="{{ $ad->title }}">
                                                </div>
                                                <div class="p-3 border border-secondary border-top-0 rounded-bottom d-flex flex-column flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <div class="text-start flex-grow-1 me-2">
                                                            <h5 class="text-wrap mb-1">{{ $ad->title }}</h5>
                                                            <p class="mb-1 text-wrap small"><i class="fa fa-map-marker-alt me-2"></i>{{ $ad->location }}</p>
                                                        </div>
                                                        <span class="badge bg-primary text-white p-2">{{ ucfirst($ad->status) }}</span>
                                                    </div>
                                                    <hr class="my-2">
                                                    <div class="d-flex align-items-center mb-2">
                                                        @if($ad->user->logo)
                                                            <img src="{{ asset('storage/' . $ad->user->logo) }}" alt="{{ $ad->user->name }}" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                                        @else
                                                            <i class="fas fa-user-circle fa-lg text-muted me-2"></i>
                                                        @endif
                                                        <span class="fw-bold">{{ $ad->user->name }}</span>
                                                    </div>
                                                    <hr class="my-2">
                                                    <p class="mb-2"><i class="fa fa-ruler-combined me-2"></i>Surface: {{ $ad->surface }} m²</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap align-items-center mt-auto pt-2">
                                                        <p class="text-dark fs-6 fw-bold mb-0">
                                                            <i class="fa fa-tag me-2"></i>{{ number_format($ad->price, 0, ',', ' ') }} F CFA
                                                        </p>
                                                        <a href="{{ route('terrains.show', $ad) }}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class="fa fa-eye me-2 text-primary"></i> Voir
                                                        </a>                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <p class="text-center" style="width: 100%;">Aucune annonce de terrain trouvée pour cette tranche de prix.</p>
                                        @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>      
            </div>
            </div>
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Publier votre terrain</h5>
                                        <h4 class="mb-0">C'est rapide et gratuit</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Gérer vos annonces</h5>
                                        <h4 class="mb-0">Tableau de bord dédié</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Trouver un acheteur</h5>
                                        <h4 class="mb-0">Mise en relation directe</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        {{-- <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">Fresh Organic Vegetables</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Banana</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Bell Papper</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="py-4">
                    <h1 class="display-3 text-white">Vendez votre terrain</h1>
                    <p class="fw-normal display-3 text-dark mb-4">rapidement et facilement</p>
                    <p class="mb-4 text-dark">Publiez votre annonce en quelques étapes et touchez une large communauté d'acheteurs potentiels.</p>
                    <a href="{{ route('login') }}" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">Publier un terrain</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    {{-- <img src="{{ asset('img/banner-terrain.png') }}" class="img-fluid w-100 rounded" alt="Terrain à vendre"> --}}
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                        <h1 style="font-size: 50px;">1</h1>
                        <div class="d-flex flex-column">
                            <span class="h2 mb-0">/Jour</span>
                            <span class="h5 text-muted mb-0">en moyenne</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Nos terrains en vedette</h1>
            <p>Découvrez une sélection de nos meilleures annonces de terrains disponibles à l'achat ou à la location.</p>
        </div>
        <div class="row g-4">
            @forelse ($featured_ads as $ad)
            <div class="col-lg-6 col-xl-4">
                <div class="p-4 rounded bg-light d-flex flex-column h-100">
                    <div class="position-relative mb-3">
                        <div id="ad-carousel-{{ $ad->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($ad->images as $key => $imagePath)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $imagePath) }}" class="d-block w-100 rounded" style="object-fit: cover; height: 180px;" alt="{{ $ad->title }}">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#ad-carousel-{{ $ad->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Précédent</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#ad-carousel-{{ $ad->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Suivant</span>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <a href="{{ route('terrains.show', $ad) }}" class="h5">{{ $ad->title }}</a>
                            <p class="text-muted small my-1"><i class="fa fa-map-marker-alt me-2"></i>{{ $ad->location }}</p>
                        </div>
                        <div class="mt-auto">
                            <h4 class="mb-3">{{ number_format($ad->price, 0, ',', ' ') }} F CFA</h4>
                            <a href="{{ route('terrains.show', $ad) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Voir</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center" style="width: 100%;">Aucun terrain trouvé.</p>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {{ $featured_ads->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
<style>
    
</style>
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-home text-secondary"></i>
                                <h4>Annonces Publiées</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fas fa-users text-secondary"></i>
                                <h4>Propriétaires inscrits</h4>
                                <h1>99+</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fas fa-handshake text-secondary"></i>
                                <h4>Terrains vendus</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fas fa-chart-line text-secondary"></i>
                                <h4>Visites mensuelles</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->


        <!-- Tastimonial Start -->
        {{-- <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Testimonial</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Tastimonial End -->

@endsection
