@extends('layouts.admin.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8 col-lg-6">
        <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
                <img src="{{ $user->logo ? asset('storage/' . $user->logo) : asset('path/to/default/logo.png') }}" 
                     class="card-img-top rounded-0" 
                     alt="Logo de l'entreprise"
                     style="object-fit: cover; height: 250px;">
                
                @if ($user->is_active)
                    <span class="badge bg-success position-absolute top-0 start-0 m-3">Actif</span>
                @else
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3">Inactif</span>
                @endif
                
                <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Modifier l'utilisateur">
                    <i class="ti ti-pencil fs-4"></i>
                </a>
            </div>
            <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">{{ $user->name }}</h6>
                <p class="text-muted fw-normal">Rôle: {{ $user->role }}</p>
                
                <hr>
                
                <p class="mb-2 fw-normal">Email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                @if ($user->coordonnees)
                    <p class="mb-2 fw-normal">Coordonnées: {{ $user->coordonnees }}</p>
                @endif
                
                @if ($user->description)
                    <p class="mb-4 fw-normal">Description: {{ $user->description }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection