@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold">Liste des utilisateurs</h5>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-2"></i>Créer un utilisateur
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Id</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Logo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nom</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Rôle</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Statut</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Coordonnées</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Description</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $user->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    @if($user->logo)
                                        <img src="{{ asset('storage/' . $user->logo) }}" alt="Logo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $user->email }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : ($user->role === 'entreprise' ? 'bg-secondary' : 'bg-primary') }} rounded-3 fw-semibold">{{ $user->role }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        @if($user->is_active)
                                            <span class="badge bg-success rounded-3 fw-semibold">Actif</span>
                                        @else
                                            <span class="badge bg-warning rounded-3 fw-semibold">Inactif</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $user->coordonnees ?? '-' }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ Str::limit($user->description, 50) ?? '-' }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->links() }}                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection