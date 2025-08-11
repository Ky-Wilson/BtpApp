@extends('layouts.admin.master')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Nouveaux utilisateurs du mois</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{ $currentMonthUsers }}</h4>
                        <div class="d-flex align-items-center mb-3">
                            @if ($usersPercentageChange > 0)
                                <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">+{{ round($usersPercentageChange, 2) }}%</p>
                            @elseif ($usersPercentageChange < 0)
                                <span class="me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-down-right text-danger"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">{{ round($usersPercentageChange, 2) }}%</p>
                            @else
                                <span class="me-1 rounded-circle bg-light-info round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-minus text-info"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">0%</p>
                            @endif
                            <p class="fs-3 mb-0">par rapport au mois précédent</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                <i class="ti ti-user fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Annonces du mois </h5>
                        <h4 class="fw-semibold mb-3">{{ $currentMonthAds }}</h4>
                        <div class="d-flex align-items-center pb-1">
                            @if ($adsPercentageChange > 0)
                                <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-right text-success"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">+{{ round($adsPercentageChange, 2) }}%</p>
                            @elseif ($adsPercentageChange < 0)
                                <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-down-right text-danger"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">{{ round($adsPercentageChange, 2) }}%</p>
                            @else
                                <span class="me-2 rounded-circle bg-light-info round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-minus text-info"></i>
                                </span>
                                <p class="fs-3 mb-0">0%</p>
                            @endif
                            <p class="fs-3 mb-0">par rapport au mois précédent</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                <i class="ti ti-files fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Annonces en attente</h5>
                <h4 class="fw-semibold mb-3">{{ $pendingAds }}</h4>
                <div class="d-flex align-items-center pb-1">
                    <div class="d-flex justify-content-center">
                        <div class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-clock-hour-4 fs-6"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card overflow-hidden">
            <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Taux d'approbation</h5>
                <h4 class="fw-semibold mb-3">{{ round($adsApprovalRate, 2) }}%</h4>
                <div class="d-flex align-items-center pb-1">
                    <div class="d-flex justify-content-center">
                        <div class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-percentage fs-6"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Annonces Récentes</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">ID</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Titre</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Utilisateur</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Statut</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Date</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentAds as $ad)
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $ad->id }}</h6></td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $ad->title }}</h6>
                                        <span class="fw-normal">{{ Str::limit($ad->description, 30) }}</span>
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
                                        <h6 class="fw-semibold mb-0 fs-4">{{ $ad->created_at->format('d/m/Y') }}</h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Nouveaux Utilisateurs</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Nom</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Email</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Date</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $user)
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-1">{{ $user->name }}</h6></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $user->email }}</p></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $user->created_at->format('d/m/Y') }}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <h4>Avis récents</h4>
    @forelse ($latestRatings as $rating)
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card overflow-hidden rounded-2 h-100">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ !empty($rating->ad->images) ? Storage::url($rating->ad->images[0]) : asset('assets/images/products/placeholder.jpg') }}" class="card-img-top rounded-0" alt="..." style="height: 200px; object-fit: cover;"></a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Annonce : {{ $rating->ad->title }}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Par: {{ $rating->name }}</h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            score:
                            @for ($i = 1; $i <= 5; $i++)
                                <li>
                                    <i class="ti ti-star {{ $i <= $rating->score ? 'text-warning' : 'text-muted' }}"></i>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <p class="mt-2 text-muted">Commentaire: {{ Str::limit($rating->comment, 50) }}</p>
                    <hr>
                    <p class="mb-1">Email: <a href="mailto:{{ $rating->email }}">{{ $rating->email }}</a></p>
                    <p class="mb-0">Contact: {{ $rating->contact }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>Aucune évaluation récente.</p>
        </div>
    @endforelse
</div>

<div class="row mt-4">
    <div class="col-lg-6">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Annonces Populaires</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Titre</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Rendez-vous</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($popularAds as $ad)
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-1">{{ $ad->title }}</h6></td>
                                    <td class="border-bottom-0"><span class="badge bg-info rounded-3 fw-semibold">{{ $ad->appointments_count }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection