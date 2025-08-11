@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Statistiques des utilisateurs</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Annonces</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Ratings</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $user->email }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="badge bg-primary rounded-3 fw-semibold">{{ $user->ads_count }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="ti ti-star fs-3 {{ $i <= round($user->ratings_avg_score ?? 0) ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                        <span class="badge bg-info rounded-3 fw-semibold ms-2">{{ $user->ratings_count }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Aucun utilisateur trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection