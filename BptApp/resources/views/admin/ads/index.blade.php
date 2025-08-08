@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Gestion des annonces</h5>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($ads->isEmpty())
                <div class="alert alert-info" role="alert">
                    Aucune annonce à afficher.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Annonce</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Utilisateur</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Statut</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Date de création</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $ad->id }}</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $ad->title }}</h6>
                                    <span class="fw-normal">{{ Str::limit($ad->description, 50) }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $ad->user->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    @if (!$ad->is_approved)
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-warning rounded-3 fw-semibold">En attente</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-success rounded-3 fw-semibold">Approuvée</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $ad->created_at->format('d/m/Y') }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.ads.show', $ad) }}" class="btn btn-primary btn-sm me-2">Détails</a>
                                        @if (!$ad->is_approved)
                                        <form action="{{ route('admin.ads.approve', $ad) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm me-2">Approuver</button>
                                        </form>
                                        @endif
                                        <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter cette annonce ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection