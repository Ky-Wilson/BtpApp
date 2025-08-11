@extends('layouts.plateforme.master')
@section('content')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">{{ $ad->title }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{-- {{ route('home') }} --}}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="{{ route('appartements.index') }}">appartement</a></li>
        <li class="breadcrumb-item active text-white">{{ $ad->title }}</li>
    </ol>
</div>
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5 justify-content-center">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded p-3">
                            @if($ad->images)
                                <div id="ad-image-carousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($ad->images as $key => $imagePath)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $imagePath) }}" class="d-block w-100 rounded" alt="{{ $ad->title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#ad-image-carousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Précédent</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#ad-image-carousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Suivant</span>
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-fluid rounded" alt="Image par défaut">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">{{ $ad->title }}</h4>
                        <p class="mb-3">Catégorie: {{ ucfirst($ad->category->name) }}</p>
                         <p>Nombre de vues : {{ $ad->views_count }}</p>

                        <p class="mb-3 badge bg-primary text-white p-2">{{ ucfirst($ad->status) }}</p>
                        <h5 class="fw-bold mb-3">{{ number_format($ad->price, 0, ',', ' ') }} F CFA</h5>
                        <p class="mb-4">Description: {{ $ad->description }}</p>
                        <div class="d-flex align-items-center mb-4">
                            @if($ad->user->logo)
                                <img src="{{ asset('storage/' . $ad->user->logo) }}" alt="{{ $ad->user->name }}" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                            @else
                                <i class="fas fa-user-circle fa-2x text-muted me-2"></i>
                            @endif
                            <span class="fw-bold">{{ $ad->user->name }}</span>
                        </div>
                        <div class="d-flex mb-4">
                            <a href="https://wa.me/{{ $ad->whatsapp_link }}" class="btn border border-secondary rounded-pill px-4 py-2 me-2 text-primary" target="_blank"><i class="fab fa-whatsapp me-2 text-primary"></i> Contacter par WhatsApp</a>
                            <a href="tel:{{ $ad->phone_number }}" class="btn border border-secondary rounded-pill px-4 py-2 text-primary"><i class="fa fa-phone me-2 text-primary"></i> Appeler</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Détails</button>
                                @if($ad->videos)
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-videos-tab" data-bs-toggle="tab" data-bs-target="#nav-videos" aria-controls="nav-videos" aria-selected="false">Vidéos</button>
                                @endif
                                @if($ad->documents)
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-documents-tab" data-bs-toggle="tab" data-bs-target="#nav-documents" aria-controls="nav-documents" aria-selected="false">Documents</button>
                                @endif
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                   

                                                <div class="col-6">
                                                    <p class="mb-0">Emplacement</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">{{ $ad->location }}</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Surface</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">{{ $ad->surface }} m²</p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Nombre de pièces</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">{{ $ad->nombre_de_pieces }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($ad->videos)
                                <div class="tab-pane" id="nav-videos" role="tabpanel" aria-labelledby="nav-videos-tab">
                                    @foreach($ad->videos as $videoPath)
                                        <video controls class="w-100 mb-3">
                                            <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
                                            Votre navigateur ne supporte pas l'élément vidéo.
                                        </video>
                                    @endforeach
                                </div>
                            @endif
                            @if($ad->documents)
                                <div class="tab-pane" id="nav-documents" role="tabpanel" aria-labelledby="nav-documents-tab">
                                    <ul>
                                        @foreach($ad->documents as $documentPath)
                                            <li><a href="{{ asset('storage/' . $documentPath) }}" target="_blank" class="text-primary">{{ basename($documentPath) }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                 <x-appointment-form :ad="$ad" />
            </div>
        </div>
    </div>
</div>
@endsection