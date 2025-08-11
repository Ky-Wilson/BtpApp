@extends('layouts.users.master')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-semibold">Liste de mes annonces</h5>
        <a href="{{ route('users.ads.create') }}" class="btn btn-primary">Créer une annonce</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($ads->isEmpty())
        <div class="alert alert-info" role="alert">
            Vous n'avez pas encore créé d'annonces.
        </div>
    @else
        <div class="row">
            @foreach ($ads->items() as $ad)
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                        {{-- Affiche la première image ou un placeholder --}}
                        <a href="{{ route('users.ads.show', $ad) }}">
                            <img src="{{ !empty($ad->images) ? Storage::url($ad->images[0]) : asset('assets/images/products/placeholder.jpg') }}" 
                                class="card-img-top rounded-0" alt="{{ $ad->title }}" style="height: 200px; object-fit: cover;">
                        </a>
                        <span class="badge {{ $ad->is_approved ? 'bg-success' : 'bg-warning text-dark' }} position-absolute top-0 start-0 m-2">
                            {{ $ad->is_approved ? 'Approuvée' : 'En attente' }}
                        </span>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">{{ $ad->title }}</h6>
                        <span class="fs-3 fw-normal text-muted d-block mb-2">{{ $ad->category->name }}</span>
                                                    <h6 class="fw-semibold fs-4 mb-0">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</h6>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                <a href="{{ route('users.ads.edit', $ad) }}" class="btn btn-warning btn-sm me-2">Modifier</a>
                                <form action="{{ route('users.ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <a href="{{ route('users.ads.show', $ad) }}" class="btn btn-primary w-100 mt-3">Détails</a>
                    </div>
                </div>
               
            </div>
            @endforeach
        </div>
    @endif
    <div class="d-flex justify-content-center mt-4">
        {{ $ads->links() }}
    </div>
</div>
 
@endsection