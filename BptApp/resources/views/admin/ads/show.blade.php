@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.ads.index') }}" class="btn btn-secondary mb-3">
                <i class="ti ti-arrow-left"></i> Retour à la liste
            </a>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="mb-4">
                        @if ($ad->images && count($ad->images) > 0)
                            <div id="adImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($ad->images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($image) }}" class="d-block w-100" alt="Image de l'annonce" style="height: 400px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($ad->images) > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#adImagesCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Précédent</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#adImagesCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Suivant</span>
                                    </button>
                                @endif
                            </div>
                        @else
                            <img src="{{ asset('assets/images/products/placeholder.jpg') }}" class="d-block w-100 rounded" alt="Image par défaut" style="height: 400px; object-fit: cover;">
                        @endif
                    </div>
                    
                    @if ($ad->videos && count($ad->videos) > 0)
                        <div class="mb-4">
                            <h5 class="fw-semibold">Vidéo de l'annonce</h5>
                            <video width="100%" height="auto" controls autoplay muted>
                                <source src="{{ Storage::url($ad->videos[0]) }}" type="video/mp4">
                                Votre navigateur ne supporte pas l'élément vidéo.
                            </video>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    <h4 class="fw-bold mb-2">{{ $ad->title }}</h4>
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge {{ $ad->is_approved ? 'bg-success' : 'bg-warning' }} text-dark me-2">{{ $ad->is_approved ? 'Approuvée' : 'En attente' }}</span>
                        @if (!$ad->is_approved)
                            <form action="{{ route('admin.ads.approve', $ad) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter cette annonce ?');" class="d-inline ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                        </form>
                    </div>
                    
                    <h5 class="fw-semibold mb-3">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</h5>
                    
                    <div class="mb-4">
                        <p class="text-muted">{{ $ad->description }}</p>
                    </div>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Catégorie :</b> <span>{{ $ad->category->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Statut :</b> <span class="text-capitalize">{{ $ad->status }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Localisation :</b> <span>{{ $ad->location ?? 'Non spécifiée' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Surface :</b> <span>{{ $ad->surface ?? 'Non spécifiée' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Pièces :</b> <span>{{ $ad->nombre_de_pieces ?? 'Non spécifié' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Équipements :</b> <span>{{ $ad->equipements ?? 'Non spécifié' }}</span>
                        </li>
                    </ul>

                    <h5 class="fw-semibold mt-4">Informations de contact</h5>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Propriétaire :</b> <span>{{ $ad->user->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Téléphone :</b> 
                            <span>
                                <a href="tel:{{ $ad->phone_number }}">{{ $ad->phone_number }}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>WhatsApp :</b> 
                            <span>
                                <a href="{{ $ad->whatsapp_link }}" target="_blank">Contacter sur WhatsApp</a>
                            </span>
                        </li>
                    </ul>

                    @if ($ad->documents && count($ad->documents) > 0)
                        <h5 class="fw-semibold mt-4">Documents (Télécharger)</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($ad->documents as $key => $document)
                                <li class="list-group-item">
                                    <a href="{{ Storage::url($document) }}" target="_blank" download>
                                        Document {{ $key + 1 }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection